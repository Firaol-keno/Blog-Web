@extends('layout')

@section('content')
<section class="singlepost">
    <div class="container singlepost__container">
        <h2>{{ $post->title }}</h2>
        <div class="post__author">
            <div class="post__author-avatar">
                <img src="{{ asset('images/' . $post->user->avatar) }}" alt="{{ $post->user->firstname }}">
            </div>
            <div class="post__author-info">
                <h5>By: {{ $post->user->firstname }} {{ $post->user->lastname }}</h5>
                <small>{{ $post->created_at->format('M d, Y - H:i') }}</small>
            </div>
        </div>
        <div class="singlepost__thumbnail">
            <img src="{{ asset('images/' . $post->thumbnail) }}" alt="{{ $post->title }}">
        </div>
        <p class="single-post-body">{{ $post->body }}</p>
    </div>
</section>
@endsection
