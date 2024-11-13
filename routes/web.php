<?php
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;

// PAGES ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');    

// ARTICLE ROUTES
Route::get('/blog/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::resource('articles', ArticleController::class)->except(['show']);
