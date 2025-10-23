<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Activity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the user's dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Contar el total de proyectos
        $totalProjects = Project::count();

        // Contar proyectos por estado
        $plannedProjects = Project::where('status', 'planned')->count();
        $ongoingProjects = Project::where('status', 'ongoing')->count();
        $completedProjects = Project::where('status', 'completed')->count();

        // Contar proyectos publicados y no publicados
        $publishedProjects = Project::where('is_published', true)->count();
        $unpublishedProjects = Project::where('is_published', false)->count();

        // Contar el total de actividades
        $totalActivities = Activity::count();

        // Obtener los proyectos más recientes (los últimos 5)
        $recentProjects = Project::latest()->take(5)->get();

        // Obtener las actividades más recientes (los últimos 5)
        // Usamos with('project') para cargar la relación y evitar consultas N+1 en la vista
        $recentActivities = Activity::with('project')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProjects',
            'plannedProjects',
            'ongoingProjects',
            'completedProjects',
            'publishedProjects',
            'unpublishedProjects',
            'recentProjects',
            'totalActivities', // <-- Agregado para el dashboard
            'recentActivities' // <-- Agregado para el dashboard
        ));
    }
}