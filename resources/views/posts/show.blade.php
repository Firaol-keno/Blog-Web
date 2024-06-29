@extends('layout')

@section('title', $post->title)

@section('content')
<section class="post-detail">
    <div class="container">
        <div class="post__thumbnail">
            <img src="{{ asset('images/' . $post->thumbnail) }}">
        </div>
        <h1>{{ $post->title }}</h1>
        <div class="post__info">
            <a href="{{ route('category.posts', $post->category_id) }}" class="category__button">{{ $post->category->title }}</a>
            <p>{{ $post->body }}</p>
            <div class="post__author">
                <div class="post__author-avatar">
                    <img src="{{ asset('images/' . $post->user->avatar) }}">
                </div>
                <div class="post__author-info">
                    <h5>By: {{ $post->user->firstname }} {{ $post->user->lastname }}</h5>
                    <small>{{ $post->created_at->format('M d, Y - H:i') }}</small>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
