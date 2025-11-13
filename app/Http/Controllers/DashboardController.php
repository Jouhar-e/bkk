<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $articles = Article::where('is_published', true)->orderBy('updated_at', 'desc')->take(3)->get();

        // dd($articles->get());
        return view('dashboard', compact('articles', 'profile'));
    }

    public function show($slug)
    {
        $profile = Profile::first();
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('show', compact('article', 'profile'));
    }

    public function profile(){
        $profile = Profile::first();
        return view('profile', compact('profile'));
    }

    public function info($category)
    {
        $profile = Profile::first();
        if ($category == 'berita') {
            $articles = Article::where('is_published', true)
                ->whereIn('category', ['berita', 'kegiatan'])
                ->orderBy('updated_at', 'desc')
                ->paginate(6);
            // dd($articles->all());
        } else {
            $articles = Article::where('is_published', true)
                ->where('category', $category)
                ->orderBy('updated_at', 'desc')
                ->paginate(6);
            // dd($articles->all());
        }

        // dd($articles);
        return view('info', compact('articles', 'profile'));
    }
}
