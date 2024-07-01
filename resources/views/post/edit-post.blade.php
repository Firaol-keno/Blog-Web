@extends('layout')

@section('content')
<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Post</h2>
        <form action="{{ route('post.update-post', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title" value="{{ old('title', $post->title) }}" required>
            
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>

            <textarea name="body" rows="10" placeholder="Body" required>{{ old('body', $post->body) }}</textarea>

            <div class="form__control inline">
                <input type="checkbox" id="is_featured" name="is_featured" {{ $post->is_featured ? 'checked' : '' }}>
                <label for="is_featured">Featured</label>
            </div>

            <div class="form__control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail">
            </div>

            <button type="submit" class="btn">Update Post</button>
        </form>
    </div>
</section>
@endsection
