@extends('template/auth')

@section('title', 'Login')

@section('pageTitle', 'Login')

@section('form')
<form action="{{ route('auth') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" class="form-control" width="18rem">
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
@endsection