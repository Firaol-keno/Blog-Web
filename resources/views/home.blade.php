@extends('layout')

@section('content')
<!-- Featured Post Section -->
@if($featured)
<section class="featured">
    <div class="container featured__container">
        <div class="post__thumbnail">
            <img src="{{ asset('images/' . $featured->thumbnail) }}" alt="{{ $featured->title }}">
        </div>
        <div class="post__info">
            <a href="{{ url('/category/' . $featured->category->id) }}" class="category__button">
                {{ $featured->category->title }}
            </a>
            <h2 class="post__title">
                <a href="{{ url('/post/' . $featured->id) }}">{{ $featured->title }}</a>
            </h2>
            <p class="post__body">{{ Str::limit($featured->body, 300) }}</p>
            <div class="post__author">
                <div class="post__author-avatar">
                    <img src="{{ asset('images/' . optional($featured->profile)->avatar) }}" alt="pp">
                </div>
                <div class="post__author-info">
                    <h5>By: FN LN</h5>
                    <small>{{ $featured->created_at->format('M d, Y - H:i') }}</small>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- End of Featured Post Section -->

<!-- Posts Section -->
<section class="posts">
    <div class="container posts__container">
        @foreach($posts as $post)
        <article class="post">
            <div class="post__thumbnail">
                <img src="{{ asset('images/' . $post->thumbnail) }}" alt="{{ $post->title }}">
            </div>
            <div class="post__info">
                <a href="{{ route('category.posts', ['id' => $post->category->id]) }}" 
                    class="category__button">{{ $post->category->title }}</a>
                
                <h3 class="post__title">
                    <a href="{{ url('/post/' . $post->id) }}">{{ $post->title }}</a>
                </h3>
                <p class="post__body">{{ Str::limit($post->body, 150) }}</p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="{{ asset('images/' . optional($post->profile)->avatar) }}" alt="UI">
                    </div>
                    <div class="post__author-info">
                        <h5>By: FN LN</h5>
                        <small>{{ $post->created_at->format('M d, Y - H:i') }}</small>
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
        <a href="{{ url('/category/' . $category->id) }}" class="category__button">{{ $category->title }}</a>
        @endforeach
    </div>
</section>

@endsection
