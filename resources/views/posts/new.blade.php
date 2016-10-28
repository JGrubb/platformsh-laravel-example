@extends('layouts/base')

@section('content')
    <h1>New Post</h1>
    <section class="post-form">
        <form action="{{ route('posts.store') }}" method="post" class="pure-form pure-form-stacked">
            <fieldset>
                {{ csrf_field() }}
                <label for="title">Title</label>
                <input type="text" name="title"
                       value="{{ $post->title }}" placeholder="title" class="pure-input-1-2">

                <label for="body">Body</label>
                <textarea name="body" id="" class="pure-input-1"
                          cols="30" rows="10">{{ $post->body }}</textarea>

                <label for="summary">Summary</label>
                <textarea name="summary" id="" class="pure-input-1"
                          rows="10">{{ $post->summary }}</textarea>

                <label for="pub_date">Published Date</label>
                <input type="date" name="pub_date" required>

                <label for="slug">slug</label>
                <input type="text" name="slug" value="{{ $post->slug }}">

                <label for="published" class="pure-checkbox">
                    <input type="checkbox" name="published"
                           value="" class="">
                    Published?
                </label>

                <button type="submit" class="pure-button pure-button-primary">Submit</button>
            </fieldset>
        </form>
    </section>
@endsection
