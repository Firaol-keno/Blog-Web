@extends('layout')

@section('title', 'Blog')

@section('content')
<section class="featured">
    <div class="container featured__container">
        @if($featuredPost)
            <div class="post__thumbnail">
                <img src="{{ asset($featuredPost->thumbnail) }}">
            </div>
            <div class="post__info">
                <a href="{{ url('/categoryPosts', $featuredPost->category->id) }}" class="category__button">
                    {{ $featuredPost->category->title }}
                </a>
                <h2 class="post__title">
                    <a href="{{ url('/post', $featuredPost->id) }}">{{ $featuredPost->title }}</a>
                </h2>
                <p class="post__body">{{ Str::limit($featuredPost->body, 150) }}</p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="{{ asset($featuredPost->user->avatar) }}">
                    </div>
                    <div class="post__author-info">
                        <h5>BY: {{ $featuredPost->user->firstname }} {{ $featuredPost->user->lastname }}</h5>
                        <small>{{ $featuredPost->created_at->format('F d, Y - H:i') }}</small>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<section class="posts">
    <div class="container posts__container">
        @foreach($posts as $post)
            <article class="post">
                <div class="post__thumbnail">
                    <img src="{{ asset($post->thumbnail) }}">
                </div>
                <div class="post__info">
                    <a href="{{ url('/categoryPosts', $post->category->id) }}" class="category__button">
                        {{ $post->category->title }}
                    </a>
                    <h3 class="post__title">
                        <a href="{{ url('/post', $post->id) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="post__body">{{ Str::limit($post->body, 100) }}</p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="{{ asset($post->user->avatar) }}">
                        </div>
                        <div class="post__author-info">
                            <h5>By: {{ $post->user->firstname }} {{ $post->user->lastname }}</h5>
                            <small>{{ $post->created_at->format('F d, Y - H:i') }}</small>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>

<section class="category__buttons">
    <div class="container category__buttons-container">
        @foreach($categories as $category)
            <a href="{{ url('/categoryPosts', $category->id) }}" class="category__button">
                {{ $category->title }}
            </a>
        @endforeach
    </div>
</section>
@endsection
