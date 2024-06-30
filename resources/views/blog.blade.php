@extends('layout')

@section('title', 'Home')

@section('content')
<section class="search__bar">
  <form class="container search__bar-container" action="">
      <div>
          <i class="uil uil-search"></i>
          <input type="search" name="search" placeholder="Search">
      </div>
      <button type="submit" class="btn">Go</button>
  </form>
</section>
<!---======================== End of Search =================-->

<section class="posts">
  <div class="container posts__container">
      @foreach($posts as $post)
      <article class="post">
          <div class="post__thumbnail">
              <img src="{{ asset('images/' . $post->thumbnail) }}" alt="{{ $post->title }}">
          </div>
          <div class="post__info">
              <a href="{{ url('/category/' . $post->category->id) }}" class="category__button">
                  {{ $post->category->title }}
              </a>
              <h3 class="post__title">
                  <a href="{{ url('/post/' . $post->id) }}">{{ $post->title }}</a>
              </h3>
              <p class="post__body">
                  {{ Str::limit($post->body, 150) }}
              </p>
              <div class="post__author">
                  <div class="post__author-avatar">
                      <img src="{{ asset('images/' . optional($post->profile)->avatar) }}" alt="{{ $post->profile->firstname }}">
                  </div>
                  <div class="post__author-info">
                      <h5>By: {{ $post->profile->firstname }} {{ $post->profile->lastname }}</h5>
                      <small>{{ $post->created_at->format('M d, Y - H:i') }}</small>
                  </div>
              </div>
          </div>
      </article>
      @endforeach
  </div>
</section>
<!--=================== End of posts  =======================-->

<section class="category__buttons">
  <div class="container category__buttons-container">
      @foreach($categories as $category)
      <a href="{{ url('/category/' . $category->id) }}" class="category__button">{{ $category->title }}</a>
      @endforeach
  </div>
</section>
<!--====================   End of category buttons ================-->
@endsection
