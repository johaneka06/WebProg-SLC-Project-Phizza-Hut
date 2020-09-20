@extends('template/page-template')

@section('title', 'Home - Phizza Hut')

@section('content')
<!-- Content -->
<div class="container">

  <!-- Title -->
  <h1 class="text-center mt-3">Our freshly made pizza!</h1>
  <h3 class="text-center">Order it now!</h3>
  <!-- End of title -->

  <!-- Search bar -->
  <div class="container mt-3">
    <form action="{{ route('search') }}" method="GET" class="form-inline">
      <label for="search">Search: </label>
      <input type="text" name="search" id="search" class="form-control ml-3 col-sm" placeholder="Type here">
      <button type="submit" class="btn btn-primary ml-3">Search</button>
    </form>
  </div>
  <!-- End of search bar -->

  <!-- Pizza card -->
  <div class="container mt-4">
    <div class="card" style="width: 18rem;">

    </div>
  </div>

  <!-- End of pizza card -->
</div>

<!-- End content -->
@endsection()
