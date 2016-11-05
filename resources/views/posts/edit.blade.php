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
        {!! Form::close() !!}
    </section>
@endsection
