<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->where('published', true)
            ->sortByDesc('pub_date')
            ->take(5)
            ->load('tags');
        return view('home')->with('posts', $posts);
    }
}
