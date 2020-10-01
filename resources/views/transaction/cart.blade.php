@extends('template/pizza')

@section('title', 'Your Cart')

@section('child-content')

@if(count($items) > 0)
@foreach($items as $item)
<div class="card mb-3">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-4">
        <img src="{{ asset('/storage/'.$item->img_loc) }}" alt="" class="card-img">
      </div>
      <div class="col-sm-8">
        <p><strong>{{ $item->name }}</strong></p>
        <p class="text-muted">Rp. {{ number_format($item->price, 2, ',', '.') }}</p>
        <form action="{{ url('/cart/update/'.Auth::user()->id.'/pizza/'.$item->pizzaId) }}" method="post" class="form-group">
          {{ csrf_field() }}
          <div class="form-inline">
            <p>Quantity: </p>
            <input type="number" name="qty" id="qty" value="{{ $item->qty }}" class="form-control ml-3">
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ url('/cart/delete/'.Auth::user()->id.'/pizza/'.$item->pizzaId) }}" class="btn btn-danger">Delete</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<a href="{{ url('/checkout/'.Auth::user()->id) }}" class="ml-5 text-center btn btn-secondary mb-5 justify-content-center">Check out</a>

@else
<h3 class="text-center">You've no item in your cart</h3>
@endif

@endsection