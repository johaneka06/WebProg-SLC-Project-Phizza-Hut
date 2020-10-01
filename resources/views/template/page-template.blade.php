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
          <a class="nav-link active" href="{{ url('/transaction/all') }}" style="border-right: 1px solid white;">View All User Transaction</a>
          <a class="nav-link active" href="{{ url('/users/all') }}" style="border-right: 1px solid white;">View All User</a>
          <!-- Update pizza -->
          <!-- Delete pizza -->
          @elseif(Auth::user()->role == 'Member')
          <a class="nav-link active" href="{{ url('/transaction') }}" style="border-right: 1px solid white;">View Transaction History</a>
          <a class="nav-link active" href="{{ url('/cart') }}" style="border-right: 1px solid white;">View Cart</a>
          @endif
          @if(Auth::check())
          <div class="dropdown">
            <button class="btn dropdown-toggle" style="color: white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->username }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/logout">Logout</a>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </nav>
  <!-- Content of each pages goes here -->
  @include('sweetalert::alert')
  @yield('content')

  <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  
</body>

</html>