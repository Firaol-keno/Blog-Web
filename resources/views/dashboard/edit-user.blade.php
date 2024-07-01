@extends('layout')

@section('content')
<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit User</h2>
        <form action="{{ route('dashboard.update-user', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="text" name="firstname" value="{{ old('firstname', $user->firstname) }}" placeholder="First Name" required>
            <input type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}" placeholder="Last Name" required>
            <select name="is_admin">
                <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>Author</option>
                <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
            </select>
            <button type="submit" class="btn">Update User</button>
        </form>
    </div>
</section>
@endsection
