<?php

namespace App\Http\Controllers;

class AgesController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function about()
    {
        return view('posts.about');
    }

    public function services()
    {
        return view('posts.services');
    }
}
