@extends('layouts/base')

@section('content')

    <div class="posts">

        @foreach($posts as $post)
        <section class="post">
            <header class="post-header">

                <h2 class="post-title">
                    {!! link_to_route('posts.show',
                            $post->title,
                            ['id' => $post->id, 'slug' => $post->slug])
                    !!}
                </h2>

                <p class="post-meta">
                    <time>{{ $post->published_at() }}</time> in @include('posts/_tags')
                </p>
            </header>

            <div class="post-description">
                <p>
                    {!! $post->renderedSummary !!}
                </p>
            </div>
        </section>
        @endforeach

    </div>

@endsection