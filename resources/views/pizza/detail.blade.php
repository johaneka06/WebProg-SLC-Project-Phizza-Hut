@extends('template/pizza')

@section('title', e($pizza->name))

@section('child-content')

<div class="row mb-3">
  <div class="col">
    <img src="{{ asset('/storage/'.$pizza->img_loc) }}" class="card-img" alt="{{ $pizza->name }}">
  </div>
  <div class="col">
    <div>
      <h4 class="card-title"><strong>{{ $pizza->name }}</strong></h4>
      <p class="card-text">{{ $pizza->desc }}</p>
      <p class="card-text text-muted">Rp. {{ number_format($pizza->price, 2, ',', '.') }}</p>
      @if(Auth::check() && Auth::user()->role == 'Member')
      <div class="mt-4 ml-4">
        @if($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @endif
        <form action="{{ url('/addtocart/'.$pizza->id) }}" method="post" class="form-inline">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="qty" class="mr-3">Quantity: </label>
            <input type="number" name="qty" id="qty" class="form-control" placeholder="0">
          </div>
          <button type="submit" class="btn btn-sm btn-primary mt-3 ml-5">Add to cart</button>
        </form>
      </div>
      @endif
    </div>
  </div>
</div>


@endsection