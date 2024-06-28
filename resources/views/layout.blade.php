<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Custom stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- Iconscout CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@1.0.0/dist/css/unicons.min.css">
  <!-- Google fonts -->
  <link href="#">
  <title>@yield('title')</title>
</head>
<body>
  @include('partials.nav')
  
  <main>
    @yield('content')
  </main>
  
  @include('partials.footer')
  
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
