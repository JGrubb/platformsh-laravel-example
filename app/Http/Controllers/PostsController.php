<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Html\FormFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth', [
            'except' => [
                'index',
                'show',
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->where('published', true)->sortByDesc('pub_date')->load('tags');
        return view('posts/index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all()->sortBy('name')->pluck('name', 'id');
        $post = new Post();
        $post->pub_date = Carbon::now(config('app.timezone'));
        return view('posts/new')->with(['post' => $post, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post($request->all());
        $post->published = (isset($post->published)) ? true : false;
        $post->slug = str_slug($post->title);
        $post->save();
        $post->tags()->sync($request->all()['tags']);

        return redirect(route('posts.show', ['id' => $post->id, 'slug' => $post->slug]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        $post = Post::find($id)->load('tags');
        if($slug !== $post->slug) {
            return redirect()
                ->route('posts.show', ['id' => $id, 'slug' => $post->slug]);
        }
        if(!$post->published && !Auth::check()) {
            return redirect('/login');
        }
        return view('posts/show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all()->sortBy('name')->pluck('name', 'id');
        $post = Post::findOrFail($id);
        return view('posts/edit')->with(['post' => $post, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $params = $request->all();
        $post->update($params);
        $post->tags()->sync($request->all()['tags']);
        return redirect(route('posts.show', ['id' => $post->id, 'slug' => $post->slug]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function unpublished() {
        $posts = Post::all()->where('published', false)->sortByDesc('created_at');
        return view('posts.index')->with('posts', $posts);
    }
}
