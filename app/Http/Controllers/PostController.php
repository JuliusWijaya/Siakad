<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard Post';

        return view('posts.index', [
            'title' => $title,
            'posts' => Post::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
            'title'     => 'Create New Post',
            'authors'   => User::get(['id', 'name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul'     => 'required|max:150',
            'slug'      => 'required|unique:posts',
            'deskripsi' => 'required',
        ]);

        $validateData['deskripsi'] = Str::limit(strip_tags($request->deskripsi), 250);
        $validateData['user_id'] = Auth::user()->id;

        Post::create($validateData);
        alert()->success('Success', 'New Post Successfully Added');
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);

        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::where('slug', $post->slug)->first();

        return view('posts.edit', [
            'post'   => $post,
            'title'  => 'Edit Post',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'judul'     => 'required|max:150',
            'deskripsi' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);
        $validateData['deskripsi'] = Str::limit(strip_tags($validateData['deskripsi']), 250);
        $validateData['user_id'] = Auth::user()->id;
        Post::where('id', $post->id)
            ->update($validateData);

        alert()->success('Success', 'New Post Successfully Added');
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        alert()->success('Success', 'Post Successfully Delete');
        return redirect('/post');
    }

    // public function createSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);

    //     return response()->json($slug);
    // }
}