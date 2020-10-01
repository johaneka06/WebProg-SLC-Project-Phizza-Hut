@extends('template/pizza')

@section('title', 'Insert Pizza')

@section('pageTitle', 'Add New Pizza')

@section('child-content')
@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger mt-2">
  {{$error}}
</div>
@endforeach
@endif
<form action="{{ route('insertPizza') }}" method="post" class="form-group" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row form-inline mt-3 ml-5">
    <label for="name" class="d-flex justify-content-end col-sm-2">Pizza Name: </label>
    <input type="text" name="name" id="name" class="ml-4 col-sm-8 form-control" placeholder="Pizza Name">
  </div>
  <div class="row form-inline mt-3 ml-5">
    <label for="price" class="d-flex justify-content-end col-sm-2">Pizza Price: </label>
    <input type="number" name="price" id="price" class="ml-4 col-sm-8 form-control" placeholder="0">
  </div>
  <div class="form-inline mt-3 ml-5">
    <label for="desc" class="d-flex justify-content-end col-sm-2">Pizza Description: </label>
    <input type="text" name="desc" id="desc" class="ml-4 col-sm-8 form-control" placeholder="Description">
  </div>
  <div class="row form-inline mt-3 ml-5">
    <label for="img" class="d-flex justify-content-end col-sm-2">Pizza Image: </label>
    <input type="file" name="img" id="img" class="ml-4 col-sm-8 form-control">
  </div>
  <div class="col-sm-6 text-center">
    <input type="submit" value="Add Pizza" class="ml-5 mt-3 btn btn-primary">
  </div>

</form>
@endsection