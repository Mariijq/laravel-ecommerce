@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Create New Book</h1>
    </div>

    <div class="row justify-content-center ">
        <div class="col-md-8">
                <div class="card-header">
                    Book Details
                </div>
                @if ($errors->any())
                @foreach ($errors->all() as $error )
                    <span class="alert alert-danger">{{$error}}</span>
                @endforeach 
              @endif
                <div class="card-body">
                    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Author</label>
                            <select name="author_id" id="" class="form-control">
                                <option value="">Select</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->authorId }}" {{ $author->authorId == $book->author_id ? 'selected' : '' }}>
                                        {{ $author->name . ' ' . $author->surname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>      
                        <div class="form-group">
                            <label for="" class="form-label">Genre</label>
                            <select name="category_id" id="" class="form-control">
                            <option value="">Select</option>
                            @foreach ($categories as $category )
                            <option value="{{$category->categoryId}}" {{$category->categoryId == $book->category_id ? 'selected' : ''}}>
                                {{$category->name}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="publishing_year">Publishing Year:</label>
                            <input type="text" name="publishing_year" value="{{ old('publishing_year') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="init_price">Initial Price:</label>
                            <input type="decimal" name="init_price" value="{{ old('init_price') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control">
                        </div>
                            
                        <button type="submit" class="btn btn-success">Create Book</button>
                    </form>
                </div>
            </div>
    </div>
</section>

@endsection
