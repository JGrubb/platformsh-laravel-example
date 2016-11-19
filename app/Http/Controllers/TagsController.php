<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagsController extends Controller
{
    public function show($slug) {
        $tag = Tag::where('slug', $slug)->first()->load('posts');
        $posts = $tag->posts->sortByDesc('pub_date')->load('tags');
        return view('posts/tags_index')->with(['posts' => $posts, 'tag' => $tag]);
    }
}
