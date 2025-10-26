@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit Author</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Author Details
                </div>
                @if ($errors->any())
                @foreach ($errors->all() as $error )
                    <span class="alert alert-danger">{{$error}}</span>
                @endforeach 
              @endif
                <div class="card-body">
                    <form action="{{ route('admin.authors.update', $author->authorId) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname', $author->surname) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" id="bio" name="bio" rows="3" required>{{ old('bio', $author->bio) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Author</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
