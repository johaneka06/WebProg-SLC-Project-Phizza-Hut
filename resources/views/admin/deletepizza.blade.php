@extends('template/pizza')
@section('title', 'Delete Pizza: '.e($pizza->name))
@section('child-content')
<div class="row mb-3">
  <div class="col-sm-3">
    <img src="{{ asset('/storage/'.$pizza->img_loc) }}" alt="" class="card-img">
  </div>
  <div class="col-sm-8 ml-3">
    <h3><strong>{{ $pizza->name }}</strong></h3>
    <p>{{ $pizza->desc }}</p>
    <p class="mt-4">Rp. {{ number_format($pizza->price, 2, ',', '.') }}</p>
    <a href="{{ url('/pizza/'.$pizza->id.'/delete') }}" class="btn btn-danger mt-3">Delete</a>
    <p><small class="text-muted">*After you click delete, this item will be deleted. This action cannot be undone. Please be certain.</small></p>
  </div>
</div>
@endsection