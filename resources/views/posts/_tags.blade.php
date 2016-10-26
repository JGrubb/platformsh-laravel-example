@foreach($post->tags as $tag)
    <a href="{{ route('tags.show', ['slug' => $tag->slug]) }}" class="post-category post-category-{{ $tag->id }}">
        {{ $tag->name }}
    </a>
@endforeach