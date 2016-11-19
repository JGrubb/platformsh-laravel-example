@extends('layouts/base', ['title' => $tag->name])

@section('intro')
    <h1 class="content-subhead">{{ $tag->name }} Posts</h1>
@endsection

@section('content')
    @include('posts/index')
@endsection
