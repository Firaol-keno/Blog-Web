@extends('layout')

@section('content')
<section class="form__section">
  <div class="container form__section">
    <h2>Add Category</h2>
    @if ($errors->any())
      <div class="alert__message error">
        <p>{{ $errors->first() }}</p>
      </div>
    @endif
    @if (session('success'))
      <div class="alert__message success">
        <p>{{ session('success') }}</p>
      </div>
    @endif
    <form action="{{ route('category.store') }}" method="POST">
      @csrf
      <input type="text" name="title" placeholder="Title" value="{{ old('title') }}">
      <textarea name="description" rows="4" placeholder="Description">{{ old('description') }}</textarea>
      <button type="submit" class="btn">Add Category</button>
    </form>
  </div>
</section>
@endsection
