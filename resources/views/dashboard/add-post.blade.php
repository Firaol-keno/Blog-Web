@extends('layout')

@section('content')
<section class="form__section">
  <div class="container form__section-container">
    <h2>Add Post</h2>
  <div class="alert__message error"> 
    <p>This is an error message</p>
  </div>
  <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text"  name="title" placeholder="Title">
    <select name="category_id">
      @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
          {{ $category->title }}
        </option>
      @endforeach
    </select>
    <textarea name="body" rows="10" placeholder="Body"></textarea>
    <div class="form__control inline">
      <input type="checkbox" name="is_featured" id="is_featured" checked>
      <label for="thumbnail">Featured</label>
    </div>
    <div class="form__control">
       <label for="thumbnail">Add Thumbnail</label>
       <input type="file" name="thumbnail" id="thumbnail">
     </div>
      <button type="submit" class="btn">Add Post</button>
    </div>
  </form>
</section> 
@endsection

 