@extends('template/page-template')

@section('content')
<div class="container">
  <div class="card mt-5">
    <h2 class="ml-4 mt-3">@yield('pageTitle')</h2>
    <div class="row">
      <div class="col-sm-8">
        <div class="container">
          @yield('child-content')
        </div>
      </div>
    </div>

  </div>
</div>
@endsection