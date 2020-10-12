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
    @if(!Auth::check() || Auth::user()->role != 'Admin')
    <form action="{{ route('search') }}" method="GET" class="form-inline col-sm-8">
      <label for="search">Search: </label>
      <input type="text" name="search" id="search" class="form-control ml-3 col-sm" placeholder="Type here">
      <button type="submit" class="btn btn-primary ml-3">Search</button>
    </form>
    @else
    <a href="/pizza/insert" class="btn btn-secondary">Add Pizza</a>
    @endif

    @if($errors->any())
    <div class="alert alert-danger mt-3">
    @foreach($errors->all() as $error)
    {{ $error }}
    @endforeach
    </div>
    @endif
  </div>
  <!-- End of search bar -->

  <!-- Pizza card -->
  @if(!$errors->any())
  <div class="container mt-4">
    <div class="row">
      <!-- Loop for each pizzas in database -->
      @foreach ($pizzas as $pizza)
      <div class="col-sm-4 mb-4">
        <form class="card mr-3">
          <a href="{{ url('/pizza/detail/id/'.$pizza->id) }}" style="width: 20rem; color: black; text-decoration: none;">
            <img src="{{ asset('storage/'.$pizza->img_loc) }}" alt="{{ $pizza->name }}" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title mb-3">{{ $pizza->name }}</h5>
              <p>Rp. {{ number_format($pizza->price, 2, ',', '.') }}</p>
            </div>
          </a>
          <!-- If admin, then show update and delete button -->
          @if(Auth::check() && Auth::user()->role == 'Admin')
          <div class="mb-3 ml-2">
            <a href="{{ url('/pizza/'.$pizza->id.'/edit/') }}" class="btn btn-primary">Update Pizza</a>
            <a href="{{ url('/pizza/'.$pizza->id.'/delete') }}" class="btn btn-danger">Delete Pizza</a>
          </div>
          @endif
          <!-- End if -->
        </form>
      </div>
      @endforeach
      <!-- End loop -->
    </div>
    {{ $pizzas->links() }}
  </div>
  @endif

  <!-- End of pizza card -->
</div>

<!-- End content -->
@endsection()