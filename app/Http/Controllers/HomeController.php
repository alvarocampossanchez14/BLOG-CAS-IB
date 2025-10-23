<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {   
        // Obtener todos los artículos
        $projects = Project::all();
        // Pasar la variable a la vista
        return view('pages.home', compact('projects'));
    }   
}
