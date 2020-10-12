@extends('template/pizza')
@section('title', 'Edit Pizza: '.e($pizza->name))
@section('child-content')
<div class="row">
  <div class="col-sm-3">
    <img src="{{ asset('/storage/'.$pizza->img_loc) }}" alt="" class="card-img">
  </div>
  <div class="col-sm-9">
    <h3>Edit Pizza Details</h3>
    @if($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger mt-6">
      {{$error}}
    </div>
    @endforeach
    @endif
    <form action="{{ url('pizza/'. $pizza->id .'/edit') }}" method="post" class="form-group" enctype="multipart/form-data">
      {{ csrf_field() }}
      @method('PUT')
      <div class="row form-inline mt-3">
        <label for="name" class="d-flex justify-content-end col-sm-3">Pizza Name: </label>
        <input type="text" name="name" id="name" class="ml-2 col-sm-7 form-control" placeholder="Pizza Name" value="{{ $pizza->name }}">
      </div>
      <div class="row form-inline mt-3">
        <label for="price" class="d-flex justify-content-end col-sm-3">Pizza Price: </label>
        <input type="number" name="price" id="price" class="ml-2 col-sm-7 form-control" placeholder="0" value="{{ $pizza->price }}">
      </div>
      <div class="row form-inline mt-3">
        <label for="desc" class="d-flex justify-content-end col-sm-3">Pizza Description: </label>
        <input type="text" name="desc" id="desc" class="ml-2 col-sm-7 form-control" placeholder="Description" value="{{ $pizza->desc }}">
      </div>
      <div class="row form-inline mt-3">
        <label for="img" class="d-flex justify-content-end col-sm-3">Pizza Image: </label>
        <input type="file" name="img" id="img" class="ml-2 col-sm-7 form-control">
      </div>
      <div class="col-sm-6 text-center">
        <input type="submit" value="Update Pizza" class="ml-5 mt-3 btn btn-primary">
      </div>

    </form>
    @endsection
  </div>

</div>