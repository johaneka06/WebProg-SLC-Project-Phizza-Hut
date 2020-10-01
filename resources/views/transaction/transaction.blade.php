@extends('template/pizza')
@if(Auth::user()->role == 'Member')
@section('title', 'Transaction History')
@elseif(Auth::user()->role == 'Admin')
@section('title', 'Members Transaction')
@endif

@section('child-content')
@foreach($transactions as $transaction)
<div class="card mb-4">
  @if($loop->iteration % 2 == 0)
  <a href="/transaction/{{$transaction->id}}" style="text-decoration: none; color: red;">
  @elseif($loop->iteration % 2 == 1)
  <a href="/transaction/{{$transaction->id}}" style="text-decoration: none; color: white; background-color: #EA2000;">
  @endif
    <div class="card-header">
      <p>Transaction at {{ $transaction->created_at }}</p>
      @if(Auth::user()->role == 'Admin')
      <p>User ID: {{ $transaction->userId }}</p>
      <p>Username: {{ $transaction->username }}</p>
      @endif
    </div>
  </a>
</div>
@endforeach
@endsection