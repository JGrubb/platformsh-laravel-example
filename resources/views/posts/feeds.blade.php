<?xml version="1.0"?>
<rss version="2.0">
    <channel>
        <title>{{ $meta['title'] }}</title>
        <link></link>
        <description>{{ $meta['description'] }}</description>
        @foreach($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <link>{{ route('posts.show', ['id' => $post->id,
                'slug' => $post->slug]) }}</link>
            <description>{{ $post->renderedSummary }}</description>
        </item>
        @endforeach
    </channel>
</rss>