<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function show($slug)
    {
        // Busca el artículo por slug
        $article = Article::where('slug', $slug)->firstOrFail();
    
        // Obtén los artículos recientes, excluyendo el actual
        $recentArticles = Article::where('id', '!=', $article->id)->latest()->take(3)->get(); 
    
        // Retorna la vista con el artículo y los artículos recientes
        return view('pages.article.ArticlePage', compact('article', 'recentArticles'));
    }
    
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.article.create', compact('categories', 'tags'));
    }

    
    public function store(Request $request)
    {
        Log::info('Iniciando el proceso de almacenamiento de un artículo');
    
        // Log de datos recibidos para validación
        Log::info('Datos recibidos para validación:', $request->all());
    
        // Validación de los campos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'purpose' => 'required|string',
            'reflections' => 'required|string',
            'creativity' => 'required|string',
            'activity' => 'required|string',
            'service' => 'required|string',
            'context' => 'required|string',
            'evaluation' => 'required|string',
            'sustainability' => 'required|string',
            'visual_caption' => 'required|string',
            'is_published' => 'boolean',
            'published_at' => 'date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'visual_documentation' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);
    
        Log::info('Validación completada');
    
        // Manejo de la imagen
        $imagePath = null;
        if ($request->hasFile('image')) {
            Log::info('Imagen recibida');
            $imagePath = $request->file('image')->store('images', 'public');
        }
    
        // Manejo de la documentación visual
        $visualDocPath = null;
        if ($request->hasFile('visual_documentation')) {
            Log::info('Documentación visual recibida');
            $visualDocPath = $request->file('visual_documentation')->store('visual_docs', 'public');
        }
    
        Log::info('Preparando para guardar el artículo');
    
        // Creación del artículo
        $article = new Article();
        $article->fill($request->only([
            'title', 
            'description', 
            'purpose', 
            'reflections', 
            'creativity', 
            'activity', 
            'service', 
            'context', 
            'evaluation', 
            'sustainability', 
            'visual_caption', 
            'is_published', 
            'published_at', 
            'category_id', 
        ]));
        
        // Asignar el slug y las rutas de las imágenes
        $article->slug = Str::slug($request->title);
        $article->image = $imagePath;
        $article->visual_documentation = $visualDocPath;
    
        try {
            $article->save();
            Log::info('Artículo guardado exitosamente');
        } catch (\Throwable $e) {
            Log::error('Error al guardar el artículo: ' . $e->getMessage());
            return redirect()->back()->withErrors('Error al guardar el artículo.')->withInput();
        }
    
        // Manejo de etiquetas
        if ($request->tags) {
            $article->tags()->sync($request->tags);
            Log::info('Etiquetas asociadas al artículo');
        }
    
        return redirect()->route('articles.show', $article->id)->with('success', 'Artículo creado con éxito.');
    }
    


    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.article.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        Log::info('Iniciando el proceso de actualización del artículo ID: ' . $article->id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'purpose' => 'required|string',
            'reflections' => 'required|string',
            'creativity' => 'required|string',
            'activity' => 'required|string',
            'service' => 'required|string',
            'context' => 'required|string',
            'evaluation' => 'required|string',
            'sustainability' => 'required|string',
            'visual_caption' => 'required|string',
            'is_published' => 'required|boolean',
            'published_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        Log::info('Validación completada');


        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $article->image = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('visual_documentation')) {
            if ($article->visual_documentation) {
                Storage::disk('public')->delete($article->visual_documentation);
            }
            $article->visual_documentation = $request->file('visual_documentation')->store('visual_docs', 'public');
        }

        try {
            $article->update([
                'title' => $request->title,
                'description' => $request->description,
                'purpose' => $request->purpose,
                'reflections' => $request->reflections,
                'creativity' => $request->creativity,
                'activity' => $request->activity,
                'service' => $request->service,
                'context' => $request->context,
                'evaluation' => $request->evaluation,
                'sustainability' => $request->sustainability,
                'visual_caption' => $request->visual_caption,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
            ]);

            $article->tags()->sync($request->tags);

            Log::info('Artículo actualizado con éxito. ID: ' . $article->id);
            return redirect()->route('articles.show', $article->id)->with('success', 'Artículo actualizado con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar el artículo ID: ' . $article->id . ' - ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al actualizar el artículo.');
        }
    }
}
