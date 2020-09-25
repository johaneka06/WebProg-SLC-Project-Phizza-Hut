@extends('template/page-template')

@section('title', 'Insert Pizza')

@section('content')
<div class="container">
  <div class="card mt-5">
    <h2 class="ml-4 mt-3">Add New Pizza</h2>
    <div class="row">
      <div class="col-sm-8">
        <div class="container mt-2">
          @if($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger">
            {{$error}}
          </div>
          @endforeach
          @endif
          <form action="{{ route('insertPizza') }}" method="post" class="form-group" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row form-inline mt-3">
              <label for="name" class="ml-auto">Pizza Name: </label>
              <input type="text" name="name" id="name" class="ml-4 col-sm-8 form-control" placeholder="Pizza Name">
            </div>
            <div class="row form-inline mt-3">
              <label for="price" class="ml-auto">Pizza Price: </label>
              <input type="number" name="price" id="price" class="ml-4 col-sm-8 form-control" placeholder="0">
            </div>
            <div class="row form-inline mt-3">
              <label for="desc" class="ml-auto">Pizza Description: </label>
              <input type="text" name="desc" id="desc" class="ml-4 col-sm-8 form-control" placeholder="Description">
            </div>
            <div class="row form-inline mt-3">
              <label for="img" class="ml-auto">Pizza Image: </label>
              <input type="file" name="img" id="img" class="ml-4 col-sm-8 form-control">
            </div>
            <div class="col-sm-6 text-center">
            <input type="submit" value="Add Pizza" class="ml-auto mt-3 btn btn-primary">
            </div>
            
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection