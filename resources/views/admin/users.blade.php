@extends('template/page-template')
@section('title', 'Phizza Hut Members')
@section('content')
<div class="container mt-5">
  <div class="row">
    @foreach($users as $user)
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header" style="background-color: #EA2000; color: white;">User ID: {{ $user->id }}</div>
        <div class="card-body">
          <p>Username: {{ $user->username }}</p>
          <p>Email: {{ $user->email }}</p>
          <p>Address: {{ $user->address }}</p>
          <p>Phone Number: {{ $user->phone_no }}</p>
          <p>Gender: {{ $user->gender }}</p>
        </div>
      </div>

    </div>
    @endforeach
  </div>

</div>

@endsection