<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="alternate" type="application/rss+xml" title="Ignored By Dinosaurs RSS" href="/posts/rss.xml"/>
    <link rel="canonical" href="">
    <link rel="shortcut icon" href="/static/favicon.png">
    @if(isset($title))
        <title>{{"$title | Ignored By Dinosaurs"}}</title>
    @else
        <title>Ignored By Dinosaurs</title>
    @endif
    @if(isset($description))
    <meta name="description" content="{{ $description }}">
    @endif
    <link rel="stylesheet" href="/css/app.css">
    <!--<![endif]-->
    <meta name="google-site-verification" content="mqU68T9C-c95bcf99Chl1-PqfKkKd1BvG2pDmzNQI_Q" />
    <meta property="fb:pages" content="1024603974292271" />
</head>
<body>
<div id="layout" class="pure-g">
    <div class="sidebar pure-u-1 pure-u-md-1-4">
        <div class="header">
            <h1 class="brand-title">
                <a href="/">Ignored By Dinosaurs</a>
            </h1>
            <h2 class="brand-tagline">A blog about hacking, but really more in a golfish sense.</h2>
            @if(Auth::check())
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="nav-item">
                            {{ link_to_route('posts.create', 'New Post', null, ['class' => 'pure-button']) }}
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </div>

    <div class="content pure-u-1 pure-u-md-3-4">
        <div>
            @yield('intro')
            @yield('content')
            <div class="footer">
                <div class="pure-menu pure-menu-horizontal">
                    <ul>
                        <li class="pure-menu-item"><a href="{{ route('posts.index') }}" class="pure-menu-link">The blog archive</a></li>
                        <li class="pure-menu-item"><a href="http://twitter.com/johnnygrubb/" class="pure-menu-link">Twitter</a>
                        </li>
                        <li class="pure-menu-item"><a href="http://github.com/jgrubb/"
                                                      class="pure-menu-link">GitHub</a></li>
                        @if(Auth::check())
                            <li class="pure-menu-item">
                                {!! Form::open([
                                    'route' => 'logout',
                                    'method' => 'POST']) !!}
                                    <button class="pure-button">Logout</button>
                                {!! Form::close() !!}
                            </li>
                        @else
                            <li class="pure-menu-item"><a href="/login"
                                                          class="pure-menu-link">login</a></li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-8646459-1', 'auto');
    ga('send', 'pageview');

</script>
<script src="/js/all.js"></script>
</body>
</html>