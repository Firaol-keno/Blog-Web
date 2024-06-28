<!-- resources/views/home.blade.php -->
@extends('layout')

@section('title', 'Home')

@section('content')
<section class="featured">
  <div class="container featured__container">   
    <div class="post__thumbnail">
      <img src="{{ asset('images/blog1.jpg') }}">
    </div>
    <div class="post__info">
      <a href="{{ url('/categoryPosts') }}" class="category__button">Wild Life</a>
      <h2 class="post__title"><a href="{{ url('/post') }}">This is the post</a></h2>
      <p class="post__body">
        Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla 
        Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla 
        Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla 
        Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla 
      </p>
      <div class="post__author">
        <div class="post__author-avatar">
          <img src="{{ asset('images/avatar2.jpg') }}">
        </div>
        <div class="post__author-info">
          <h5>BY: Abdi Keno</h5>
          <small>June 10, 2023 - 07:24</small>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="posts">
  <div class="container posts__container">
    <article class="post">
      <div class="post__thumbnail">
        <img src="{{ asset('images/blog2.jpg') }}">
      </div>
      <div class="post__info">
        <a href="{{ url('/categoryPosts') }}" class="category__button">Wild Life</a>
        <h3 class="post__title">
          <a href="{{ url('/post') }}">The post</a>
        </h3>
        <p class="post__body">
          The post bla bla bla
          The post bla bla bla
          The post bla bla bla
          The post bla bla bla 
        </p>
        <div class="post__author">
          <div class="post__author-avatar">
            <img src="{{ asset('images/avatar3.jpg') }}">
          </div>
          <div class="post__author-info">
            <h5>By: John Mills</h5>
            <small>June 13, 2022 - 10:34</small>
          </div>
        </div>
      </div>
    </article>
    <!-- Repeat other articles similarly -->
  </div>
</section>
<section class="category__buttons">
  <div class="container category__buttons-container">
    <a href="" class="category__button">Art</a>
    <a href="" class="category__button">Wild</a>
    <a href="" class="category__button">Travel</a>
    <a href="" class="category__button">Science & Technology</a>
    <a href="" class="category__button">Food</a>
    <a href="" class="category__button">Musics</a>
  </div>
</section>
@endsection
