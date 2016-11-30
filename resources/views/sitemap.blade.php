<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($posts as $post)
        <url>
            <loc>{{ route('posts.show', ['id' => $post->id, 'slug' => $post->slug]) }}</loc>
            <lastmod>{{ $post->updated_at }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach($tags as $tag)
        <url>
            <loc>{{ route('tags.show', ['slug' => $tag->slug]) }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
        </url>
    @endforeach
</urlset>