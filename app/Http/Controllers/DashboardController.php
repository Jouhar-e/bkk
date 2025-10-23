<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $articles = Article::where('is_published', true)->orderBy('updated_at', 'desc')->take(3)->get();

        // dd($articles->get());
        return view('dashboard', compact('articles'));
    }

    public function show($slug) {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('show', compact('article'));
    }
    
}
