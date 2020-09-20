@extends('template/page-template')

@section('title', 'Login')

@section('content')
<div class="container mt-5">
  <div class="card">
    <p class="card-header" style="background-color: #ff5d0d; color: white;">Login</h5>
      <div class="card-body">
        <form action="" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" class="form-control" width="18rem">
          </div>
          <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" class="form-control mr-sm-2">
          </div>
          <div class="form-group">
            <input type="checkbox" name="rememberme" id="rememberme"> Remember me
          </div>
          
          <button type="submit" class="btn btn-primary">Log In</button>
          <a href="#">Forgot your password?</a>
        </form>
      </div>
  </div>
</div>
@endsection