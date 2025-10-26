@extends('admin.layouts.master')

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Edit Category</h1>
  </div>
  @if ($errors->any())
  @foreach ($errors->all() as $error )
      <span class="alert alert-danger">{{$error}}</span>
  @endforeach 
@endif
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card-header">
        <form action="{{ route('admin.categories.update', $category->categoryId) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" name="name" class="form-control" style="width: 100%" value="{{ $category->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
      </form>
      </div>
    </div>
  </div>
</section>

@endsection
