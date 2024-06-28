@extends('layout')

@section('title', 'Sign Up')

@section('content')
<section class="form__section">
    <div class="container form__section-container">
         <h2>Sign Up</h2>
         
         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif

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

        <form action="{{ route('signup') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Create Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar" required>
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small>Already have an account? <a href="{{ url('/signin') }}">Sign in</a></small>
        </form>
    </div>
</section>
@endsection
