<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index(Request $request)
    {   
        $query = Project::where('is_published', 1);

        if ($request->has('search') && $request->search != '') {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->input('status'));
        }

        $projects = $query->latest()->get();

        return view('pages.project.index', compact('projects'));
    }

    public function show(Project $project)
    {
        // Laravel has already found the project for you!
        $recentProjects = Project::where('id', '!=', $project->id)->latest()->take(3)->get();
        return view('pages.project.show', compact('project', 'recentProjects'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.project.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Log::info('Iniciando el proceso de almacenamiento de un PROYECTO CAS');

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:planned,ongoing,completed',
            'location' => 'nullable|string|max:255',
            'supervisor_name' => 'nullable|string|max:255',
            'supervisor_contact' => 'nullable|string|max:255',
            'creativity' => 'required|string',
            'activity' => 'required|string',
            'service' => 'required|string',
            'evaluation_and_objectives' => 'required|string',
            'reflection' => 'required|string',
            'lo_1' => 'nullable|boolean',
            'lo_2' => 'nullable|boolean',
            'lo_3' => 'nullable|boolean',
            'lo_4' => 'nullable|boolean',
            'lo_5' => 'nullable|boolean',
            'lo_6' => 'nullable|boolean',
            'lo_7' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'evidences.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,pdf|max:10240', // 10MB por archivo, permite PDF
            'is_published' => 'boolean',
        ]);

        Log::info('Validación completada para el proyecto.');
        
        $validatedData['slug'] = Str::slug($validatedData['title']);

        // Subir la imagen y añadir la ruta a los datos validados
        if ($request->hasFile('image')) {
            Log::info('Imagen recibida para proyecto.');
            $validatedData['image'] = $request->file('image')->store('projects/images', 'public');
        }

        foreach (range(1, 7) as $i) {
            $validatedData["lo_$i"] = $request->boolean("lo_$i");
        }

        try {
            $project = Project::create($validatedData);

            if ($request->hasFile('evidences')) {
                foreach ($request->file('evidences') as $evidence) {
                    $path = $evidence->store('projects/evidences', 'public');
                    $project->evidences()->create([
                        'file_path' => $path,
                        'file_name' => $evidence->getClientOriginalName(),
                        'mime_type' => $evidence->getClientMimeType(),
                    ]);
                }
            }

            if ($request->tags) {
                $project->tags()->sync($request->tags);
            }

            Log::info('Proyecto CAS guardado exitosamente. ID: ' . $project->id);
            return redirect()->route('projects.show', $project->slug)->with('success', 'Proyecto CAS creado con éxito.');

        } catch (\Throwable $e) {
            Log::error('Error al guardar el proyecto CAS: ' . $e->getMessage());
            return redirect()->back()->withErrors('Error al guardar el proyecto CAS.')->withInput();
        }
    }

    public function edit(Project $project)
    {
        $categories = Category::all();
        // $tags = Tag::all();

        return view('pages.project.edit', compact('project', 'categories'));
    }

     public function update(Request $request, Project $project)
    {
        Log::info('--- INICIO UPDATE PROYECTO ---');
        Log::info('Archivos recibidos:', ['files' => $request->file('evidences')]);
        Log::info('Request all:', $request->all());
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'location' => 'nullable|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'description' => 'required|string',
                'creativity' => 'nullable|string',
                'activity' => 'nullable|string',
                'service' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'evidences' => 'nullable|array',
                'evidences.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,pdf|max:10240', // 10MB por archivo, permite PDF
                'reflection' => 'nullable|string',
                'evaluation_and_objectives' => 'nullable|string',
                'status' => ['required', Rule::in(['planned', 'ongoing', 'completed'])],
                'is_published' => 'nullable|boolean',
                'supervisor_name' => 'nullable|string|max:255',
                'supervisor_contact' => 'nullable|string|max:255',
                'lo_1' => 'nullable|boolean',
                'lo_2' => 'nullable|boolean',
                'lo_3' => 'nullable|boolean',
                'lo_4' => 'nullable|boolean',
                'lo_5' => 'nullable|boolean',
                'lo_6' => 'nullable|boolean',
                'lo_7' => 'nullable|boolean',
            ]);
            Log::info('Validación completada en update.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error de validación:', $e->errors());
            throw $e;
        }

        // 2. Manejar la subida de la nueva imagen de portada
        if ($request->hasFile('image')) {
            Log::info('Imagen recibida en update.');
            // Borrar imagen anterior si existe
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validatedData['image'] = $request->file('image')->store('projects/images', 'public');
        }

        // 3. Generar el slug a partir del título y evitar duplicados
        $slug = Str::slug($validatedData['title']);
        $validatedData['slug'] = $slug;

        // 4. Actualizar el proyecto en la base de datos
        $project->update($validatedData);

        // 5. Manejar la subida de nuevas evidencias
        if ($request->hasFile('evidences')) {
            Log::info('Procesando evidencias en update.');
            foreach ($request->file('evidences') as $file) {
                Log::info('Procesando archivo:', [
                    'originalName' => $file->getClientOriginalName(),
                    'mimeType' => $file->getClientMimeType(),
                    'size' => $file->getSize()
                ]);
                $path = $file->store('projects/evidences', 'public');
                $project->evidences()->create([
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        } else {
            Log::info('No se recibieron evidencias en update.');
        }

        Log::info('--- FIN UPDATE PROYECTO ---');
        // 6. Redirigir al usuario
        return redirect()->route('projects.show', $project->slug)->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy(Project $project)
    {
        // if ($project->image) {
        //     Storage::disk('public')->delete($project->image);
        // }

        // foreach ($project->evidences as $evidence) {
        //     Storage::disk('public')->delete($evidence->file_path);
        //     $evidence->delete();
        // }


        $project->delete();
        Log::info('Proyecto CAS eliminado exitosamente. ID: ' . $project->id);
        return redirect()->route('projects.index')->with('success', 'Proyecto CAS eliminado con éxito.');
    }

    public function deleteEvidence(Project $project, $evidenceId)
    {
        $evidence = $project->evidences()->findOrFail($evidenceId);
        Storage::disk('public')->delete($evidence->file_path);
        $evidence->delete();

        Log::info('Evidencia eliminada del proyecto CAS ID: ' . $project->id . ', Evidencia ID: ' . $evidenceId);
        return redirect()->route('projects.show', $project->slug)->with('success', 'Evidencia eliminada correctamente.');
    }
}