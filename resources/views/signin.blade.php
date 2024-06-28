@extends('layout')

@section('title', 'Sign In')

@section('content')
<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign In</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('signin') }}" method="POST">
            @csrf
            <input type="text" name="username_or_email" placeholder="Username or Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Sign In</button>
            <small>Don't have an account? <a href="{{ url('/signup') }}">Sign up</a></small>
        </form>
    </div>
</section>
@endsection
