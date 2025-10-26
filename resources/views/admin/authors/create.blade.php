@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Create New Author</h1>
    </div>
    @if ($errors->any())
    @foreach ($errors->all() as $error )
        <span class="alert alert-danger">{{$error}}</span>
    @endforeach 
  @endif
    <div class="row justify-content-center ">
        <div class="col-md-8">
        <div class="card-header">
     Author Details
    </div>
    <div class="card-body">
    <form action="{{ route('admin.authors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" id="bio" name="bio" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Author</button>
    </form>
  </div>
    </div>
</section>

@endsection
