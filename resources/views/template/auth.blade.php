@extends('template/page-template')

@section('content')
<div class="container mt-5 col-sm-4">
  <div class="card">
    <p class="card-header" style="background-color: #EA2000; color: white;">@yield('pageTitle')</p>
    @if($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
      {{ $error }}
    </div>
    @endforeach
    @endif
    <div class="card-body">
      @yield('form')
    </div>
  </div>
</div>
@endsection