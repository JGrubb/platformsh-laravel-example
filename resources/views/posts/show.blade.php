@extends("layouts/base")

@section('content')

<section class="post">
    @include('posts/_prev_next_buttons')
    <header class="post-header">
        <h2 class="post-title">{{ $post->title }}</h2>
        <time>{{ $post->pub_date }}</time>
        in @include('posts/_tags')
    </header>

    <div class="post-description">
        {!! $post->body !!}

        <div id="related">
            Related stuff here
        </div>

        @if(Auth::check())
        <div class="edit-link">
            <a class="pure-button" href="{{ route('posts.edit', ['id' => $post->id]) }}">Edit</a>
        </div>
        @endif
        @include('posts/_prev_next_buttons')
        <div id="disqus_thread"></div>
        <script>
            (function () { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = '//ignoredbydinosaurs.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments
                powered by Disqus.</a></noscript>
    </div>
</section>
@endsection