@extends('layouts/base')

@section('content')
    <h1>Edit {{ $post->title }}</h1>
    <section class="post-form">
        {!! Form::model($post,
            [
                'method' => 'PATCH',
                'route' => ['posts.update', $post->id],
                'class' => 'pure-form pure-form-stacked'
            ]) !!}
            @include('posts/_form')
            {!! link_to_route('posts.show', 'Back to post', ['id' => $post->id, 'slug' => $post->slug]) !!}
        {!! Form::close() !!}
    </section>
@endsection
