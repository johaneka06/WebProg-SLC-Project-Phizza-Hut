@extends('template/pizza')

@section('title', 'Your Cart')

@section('child-content')

<h3 class="text-center">Carts</h3>

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
        <!-- Update form -->
        <form action="{{ url('/cart/update/'.$item->id) }}" method="post" class="form-group" id="update">
          {{ csrf_field() }}
          @method('PUT')
          <div class="form-inline">
            <p>Quantity: </p>
            <input type="number" name="qty" id="qty" value="{{ $item->qty }}" class="form-control ml-3">
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-primary" value="Update">Update</button>
            <a href="{{ url('/cart/delete/'.$item->id) }}" class="btn btn-danger">Remove</a>
          </div>
        </form>
        <!-- End update form -->
      </div>
    </div>
  </div>
</div>
@endforeach
<a href="{{ url('/checkout/'.Auth::user()->id) }}" class="ml-5 text-center btn btn-secondary mb-4">Check out</a>

@else
<h3 class="text-center">You've no item in your cart</h3>
@endif

@endsection