<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {   
        // Obtener todos los artículos
        $articles = Article::all();
        // Pasar la variable a la vista
        return view('pages.home', compact('articles'));
    }   
}
