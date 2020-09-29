<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #EA2000;">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Phizza Hut</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          @if(!Auth::check())
          <a class="nav-link active" href="{{ url('/login') }}" style="border-right: 1px solid white;">Login</a>
          <a class="nav-link active" href="{{ url('/register') }}">Register</a>
          @elseif(Auth::user()->role == 'Admin')
          <a class="nav-link active" href="{{ url('/pizza/add') }}" style="border-right: 1px solid white;">Add Pizza</a>
          @endif
          @if(Auth::check())
          <a class="nav-link active" href="{{ url('/logout') }}">Logout</a>
          @endif
        </div>
      </div>
    </div>
  </nav>
  <!-- Content of each pages goes here -->
  @include('sweetalert::alert')
  @yield('content')

  <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>