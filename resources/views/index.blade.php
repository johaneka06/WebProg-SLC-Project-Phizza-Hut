@extends('template/page-template')

@section('title', 'Home - Phizza Hut')

@section('content')
<!-- Content -->
<div class="container">

  <!-- Title -->
  <h1 class="mt-3">Our freshly made pizza!</h1>
  <!-- End of title -->

  <!-- Search bar -->
  <div class="container mt-3">
    <h3 class="mb-4" style="color: gray;">order it now!</h3>
    <form action="{{ route('search') }}" method="GET" class="form-inline col-sm-8">
      <label for="search">Search: </label>
      <input type="text" name="search" id="search" class="form-control ml-3 col-sm" placeholder="Type here">
      <button type="submit" class="btn btn-primary ml-3">Search</button>
    </form>
  </div>
  <!-- End of search bar -->

  <!-- Pizza card -->
  <div class="container mt-4">
    <div class="row">
      <!-- @foreach ($names as $name) -->
      <div class="col">
        <div class="card mb-4" style="width: 18rem;">
          
        </div>
      </div>
      <!-- @endforeach -->
    </div>
  </div>

  <!-- End of pizza card -->
</div>

<!-- End content -->
@endsection()