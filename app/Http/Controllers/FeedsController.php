<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FeedsController extends Controller
{
    public function index() {
        $posts = Post::all()->sortByDesc('pub_date')->take(10);
        $meta = [
            'title' => 'Ignored By Dinosaurs main feed',
            'description' => 'SSIA, doesn\'t it?'
        ];
        return view('posts/feeds')->with(['posts' => $posts, 'meta' => $meta]);
    }
}
