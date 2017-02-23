---
title: {{ $post->title }}
tags:
@foreach($post->tags as $tag)
    - {{ $tag->name }}
@endforeach
date: {{ $post->getXmlSitemapDateAttribute() }}
slug: {{ $post->id }}-{{ $post->slug }}
@unless($post->published)draft: true
@endunless
---
{{ $post->body }}