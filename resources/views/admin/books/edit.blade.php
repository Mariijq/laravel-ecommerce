@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit Book</h1>
    </div>
    @if ($errors->any())
    @foreach ($errors->all() as $error )
        <span class="alert alert-danger">{{$error}}</span>
    @endforeach 
  @endif
  <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card-header">
                    Edit Book Details
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.books.update', $book->ISBN) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>
                            <label for="title">Title:</label>
                            <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="author_id">Author:</label>
                            <select name="author_id" class="form-control">
                                @foreach ($authors as $author)
                                    <option value="{{ $author->authorId }}" {{ $author->authorId == $book->author_id ? 'selected' : '' }}>{{ $author->name . ' ' . $author->surname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->categoryId }}" {{ $category->categoryId == $book->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control">{{ old('description', $book->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="publishing_year">Publishing Year:</label>
                            <input type="text" name="publishing_year" value="{{ old('publishing_year', $book->publishing_year) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="init_price">Initial Price:</label>
                            <input type="number" name="init_price" value="{{ old('init_price', $book->init_price) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" value="{{ old('quantity', $book->quantity) }}" class="form-control">
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
