@extends('layouts/base', ['title' => $tag->name, 'tag' => $tag ])

@section('intro')
    <h1 class="content-subhead">{{ $tag->name }} Posts</h1>
    <a style="float: right" rel="alternate" type="application/rss+xml" href="{{ url("tags/{$tag->slug}/rss.xml") }}"><img src="{{ url('img/feed-icon-28x28.png') }}" alt=""></a>
@endsection

@section('content')
    @include('posts/index')
@endsection
