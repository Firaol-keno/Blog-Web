<!-- resources/views/posts/create.blade.php -->
@extends('layout')

@section('content')
<section class="form__section">
  <div class="container form__section-container">
    <h2>Add Post</h2>
    @if(session('success'))
        <div class="alert__message success">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if($errors->any())
        <div class="alert__message error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" name="title" placeholder="Title" value="{{ old('title') }}">
      <select name="category_id">
        <option value="1">Travel</option>
        <option value="2">Art</option>
        <option value="3">Science & Technology</option>
        <option value="4">Food</option>
        <option value="5">Music</option>
      </select>
      <textarea name="body" rows="10" placeholder="Body">{{ old('body') }}</textarea>
      <div class="form__control inline">
        <input type="checkbox" id="is_featured" name="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
        <label for="is_featured">Featured</label>
      </div>
      <div class="form__control">
         <label for="thumbnail">Add Thumbnail</label>
         <input type="file" id="thumbnail" name="thumbnail">
       </div>
        <button type="submit" class="btn">Add Post</button>
      </div>
    </form>
</section> 
@endsection
