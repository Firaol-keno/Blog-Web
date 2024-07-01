@extends('layout')

@section('content')
<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Category</h2>
        <form action="{{ route('dashboard.update-category', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $category->id }}">
            <input type="text" name="title" value="{{ old('title', $category->title) }}" placeholder="Title" required>
            <textarea rows="4" name="description" placeholder="Description" required>{{ old('description', $category->description) }}</textarea>
            <button type="submit" class="btn">Update Category</button>
        </form>
    </div>
</section>
@endsection
