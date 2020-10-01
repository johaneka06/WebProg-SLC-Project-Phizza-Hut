@extends('template/pizza')
@section('title', 'Transaction at '.e($transactions[0]->created_at))
@section('child-content')
@foreach($transactions as $transaction)
<div class="card mb-4">
  <div class="row">
    <div class="col-sm-3 mt-3 mb-3">
      <img src="{{ asset('/storage/'.$transaction->img_loc) }}" alt="{{ $transaction->name }}" class="ml-3 card-img">
    </div>
    <div class="col-sm-8 mt-3 mb-3 ml-3">
      <h5><strong>{{ $transaction->name }}</strong></h5>
      <p class="text-muted">Rp. {{ number_format($transaction->price, 2, ',', '.') }}</p>
      <p>Quantity: {{ $transaction->qty }}</p>
      <p>Total Price: Rp. {{ number_format($transaction->qty * $transaction->price, 2, ',', '.') }}</p>
    </div>
  </div>
</div>
@endforeach
@endsection