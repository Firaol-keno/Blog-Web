@extends('layout')

@section('title', $category->title)

@section('content')
<section class="category-posts">
    <div class="container">
        <h1>{{ $category->title }}</h1>
        <div class="posts__container">
            @foreach($posts as $post)
            <article class="post">
                <div class="post__thumbnail">
                    <img src="{{ asset('images/' . $post->thumbnail) }}">
                </div>
                <div class="post__info">
                    <h2><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                    <p>{{ Str::limit($post->body, 150) }}</p>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
