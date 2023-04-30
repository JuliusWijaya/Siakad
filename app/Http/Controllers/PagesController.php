<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.index', [
            'name'  => 'Laravel',
            'title' => 'Home'
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