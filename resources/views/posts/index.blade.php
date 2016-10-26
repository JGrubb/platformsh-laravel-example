@extends('layouts/base')

@section('content')

    <div class="posts">

        @foreach($posts as $post)
        <section class="post">
            <header class="post-header">

                <h2 class="post-title">
                    <a href="{{ route('posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}">{{ $post->title }}</a>
                </h2>

                <p class="post-meta">
                    <time>{{ $post->pub_date }}</time> in @include('posts/_tags')
                </p>
            </header>

            <div class="post-description">
                <p>
                    {!! $post->summary !!}
                </p>
            </div>
        </section>
        @endforeach

    </div>

@endsection