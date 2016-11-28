@extends('layouts/base', ['title' => 'Welcome!'])

@section('intro')
    <div class="posts">
        <h1 class="content-subhead">About this</h1>
        <a style="float: right" rel="alternate" type="application/rss+xml" href="{{ url('posts/rss.xml') }}"><img src="{{ url('img/feed-icon-28x28.png') }}" alt=""></a>

        <!-- A single blog post -->
        <section class="post">
            <header class="post-header">

                <h2 class="post-title">Hello.</h2>

            </header>

            <div class="post-description">
                <p>
                    This blog began life as a chronicle of my life inside a touring band with a music/business idea. The
                    early days were me writing about letting go of an old dream so that I could have a new one.
                    Then it sort of turned into an autobiography
                    of the last 8 or so years of my life - moving from the music business into the tech
                    business, fatherhood, life and all that.
                </p>
                <p>
                    For the last 8 years I've worked with, thought about, and written about a variety of web
                    technologies - Drupal, Rails,
                    Linux, AWS.
                    <a href="https://www.linkedin.com/in/johnnygrubb">My LinkedIn resume is here.</a> I still think and
                    occasionally write about the music business and other personal things but lately I'm using this
                    as a scratch pad to write about my new gig.
                </p>
                <p>
                    So welcome and please have a look around.
                </p>
                <p><em>- Grubb, November 2016</em></p>
            </div>
        </section>
    </div>

    <h1 class="content-subhead">Recent Posts</h1>
@endsection

@section('content')
    @include('posts/index')
@endsection
