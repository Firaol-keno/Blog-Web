@extends('layout')

@section('title', 'Home')

@section('content')
<section class="search__bar">
  <form class="container search__bar-container" action="">
      <div>
          <i class="uil uil-search"></i>
          <input type="search" name="" placeholder="Search">
      </div>
      <button type="submit" class="btn">Go</button>
  </form>
</section>
<!---======================== End of Search =================-->

<section class="posts">
  <div class="container posts__container">
      <article class="post">
          <div class="post__thumbnail">
              <img src="{{ asset('images/blog2.jpg') }}">
          </div>
          <div class="post__info">
              <a href="#" class="category__button">Wild Life</a>
              <h3 class="post__title">
                  <a href="#">The post</a>
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

      <!-- Repeat for other posts -->
      
  </div>
</section>
<!--=================== End of posts  =======================-->

<section class="category__buttons">
  <div class="container category__buttons-container">
      <a href="#" class="category__button">Art</a>
      <a href="#" class="category__button">Wild</a>
      <a href="#" class="category__button">Travel</a>
      <a href="#" class="category__button">Science & Technology</a>
      <a href="#" class="category__button">Food</a>
      <a href="#" class="category__button">Musics</a>
  </div>
</section>
<!--====================   End of category buttons ================-->
@endsection