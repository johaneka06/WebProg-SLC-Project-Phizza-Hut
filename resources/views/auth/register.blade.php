@extends('template/page-template')

@section('title', 'Register yourself')

@section('content')

<div class="container mt-5 col-sm-5">
  <div class="card">
    <p class="card-header" style="background-color: #ff5d0d; color: white;">Register</p>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
      {{ $error }}
    </div>
    @endforeach
    @endif
    <div class="card-body">
      <form action="{{ route('regist') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="username">Username: </label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email: </label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password: </label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Confirm Password: </label>
          <input type="password" name="confirm" id="confirm" class="form-control">
        </div>
        <div class="form-group">
          <label for="address">Address: </label>
          <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
          <label for="phone_no">Phone Number: </label>
          <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-inline">
          <label>Gender: </label>
          <fieldset id="gender" name="gender" class="form-inline">
            <input type="radio" name="gender" id="male" value="Male" class="ml-4">
            <label for="male" class="ml-1">Male</label>
            <input type="radio" name="gender" id="female" value="Female" class="ml-4">
            <label for="female" class="ml-1">Female</label>
          </fieldset>
        </div>
        <div class="form-inline">
          <input type="submit" class="btn btn-primary mt-3 btn-block" value="Submit">
        </div>
      </form>
    </div>
  </div>
</div>

<script src="{{ asset('js/bootstrap.js') }}">
</script>

@endsection