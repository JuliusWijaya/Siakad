<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home()
    {
        $posts = Post::with('penulis')->latest()->get(['id', 'judul', 'deskripsi', 'user_id']);

        return view('pages.index', [
            'name'  => 'Laravel',
            'title' => 'Home',
            'posts' => $posts,
        ]);
    }

    public function about()
    {
        $name = 'About Laravel';
        return view('pages.about', [
            'title' => 'About',
            'name'  => $name
        ]);
    }
}