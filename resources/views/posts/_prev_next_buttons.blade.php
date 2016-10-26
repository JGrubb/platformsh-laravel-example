@if($post->prev)
    <a href="{{ route('posts.show', ['id' => $post->prev->id, 'slug' => $post->prev->slug]) }}">{{ $post->prev->title }}</a>
@endif
@if($post->next)
    <a href="{{ route('posts.show', ['id' => $post->next->id, 'slug' => $post->next->slug]) }}">{{ $post->next->title }}</a>
@endif