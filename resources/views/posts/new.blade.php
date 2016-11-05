@extends('layouts/base')

@section('content')
    <h1>New Post</h1>
    <section class="post-form">
        {!! Form::model($post, ['url' => 'posts', 'class' => 'pure-form pure-form-stacked']) !!}
            @include('posts/_form')
        {!! Form::close() !!}
    </section>
@endsection
