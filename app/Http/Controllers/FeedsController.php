<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
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

    public function tags(string $slug) {
        $tag = Tag::where('slug', $slug)->first()->load('posts');
        $posts = $tag->posts->sortByDesc('pub_date')
            ->where('published', true);
        $meta  = [
            'title' => "Ignored By Dinosaurs {$tag->name} feed",
            'description' => $tag->name
        ];
        return view('posts/feeds')->with(['posts' => $posts, 'meta' => $meta]);
    }
}
