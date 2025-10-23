<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Project;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::orderBy('date', 'desc')->get();
        return view('pages.activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('pages.activity.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'supervisor_name' => 'nullable|string|max:255',
            'supervisor_contact' => 'nullable|string|max:255',
            'creativity' => 'nullable|string',
            'activity' => 'nullable|string',
            'service' => 'nullable|string',
            'evaluation' => 'nullable|string',
            'reflection' => 'nullable|string',
            'lo_1' => 'nullable|boolean',
            'lo_2' => 'nullable|boolean',
            'lo_3' => 'nullable|boolean',
            'lo_4' => 'nullable|boolean',
            'lo_5' => 'nullable|boolean',
            'lo_6' => 'nullable|boolean',
            'lo_7' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'evidences.*' => 'nullable|file|max:10240'
        ]);

        // 1. Lógica para subir la imagen de portada de la actividad
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('activities/images', 'public');
            $validatedData['image'] = $imagePath;
        }

        foreach (range(1, 7) as $i) {
            $validatedData["lo_$i"] = $request->boolean("lo_$i");
        }

        // 2. Crear la actividad en la base de datos (solo una vez)
        $activity = Activity::create($validatedData);

        // 3. Lógica para subir las evidencias y asociarlas a la actividad
        if ($request->hasFile('evidences')) {
            foreach ($request->file('evidences') as $evidenceFile) {
                $path = $evidenceFile->store('activities/evidences', 'public');
                $activity->evidences()->create([
                    'file_path' => $path,
                    'file_name' => $evidenceFile->getClientOriginalName(),
                    'mime_type' => $evidenceFile->getClientMimeType(),
                ]);
            }
        }

        // Redirigir al usuario
        return redirect()->route('activities.index')->with('success', '¡Actividad creada correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {

        $recentActivities = Activity::where('id', '!=', $activity->id)->latest()->take(3)->get();
        return view('pages.activity.show', compact('activity', 'recentActivities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        $projects = Project::all();
        return view('pages.activity.edit', compact('activity', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $validatedData = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'supervisor_name' => 'nullable|string|max:255',
            'supervisor_contact' => 'nullable|string|max:255',
            'creativity' => 'nullable|string',
            'activity' => 'nullable|string',
            'service' => 'nullable|string',
            'evaluation' => 'nullable|string',
            'reflection' => 'nullable|string',
            'lo_1' => 'nullable|boolean',
            'lo_2' => 'nullable|boolean',
            'lo_3' => 'nullable|boolean',
            'lo_4' => 'nullable|boolean',
            'lo_5' => 'nullable|boolean',
            'lo_6' => 'nullable|boolean',
            'lo_7' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'evidences.*' => 'nullable|file|max:10240'
        ]);

        // Normalizar checkboxes LO antes de actualizar
        foreach (range(1, 7) as $i) {
            $validatedData["lo_$i"] = $request->boolean("lo_$i");
        }

        // Manejo de imagen (si se sube una nueva, se reemplaza la ruta)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('activities/images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Actualizar la actividad
        $activity->update($validatedData);

        // Adjuntar nuevas evidencias si existen
        if ($request->hasFile('evidences')) {
            foreach ($request->file('evidences') as $evidenceFile) {
                $path = $evidenceFile->store('activities/evidences', 'public');
                $activity->evidences()->create([
                    'file_path' => $path,
                    'file_name' => $evidenceFile->getClientOriginalName(),
                    'mime_type' => $evidenceFile->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('activities.index')->with('success', '¡Actividad actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('activities.index')->with('success', '¡Actividad eliminada correctamente!');
    }
}