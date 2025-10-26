@extends('frontend.layouts.master')
    
@section('content')
<div class="container mt-5">
    <h2>Search Results for '{{ $query }}'</h2>
</div>

<div class="container mt-5">
    <h3>Books</h3>
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset($book->image) }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">Written by: {{ $book->author->name . ' ' . $book->author->surname }}</p>
                        <p class="card-text">Price: ${{ $book->init_price }}</p>
                        <a href="{{ route('add-to-cart', ['ISBN' => $book->ISBN]) }}" class="btn btn-primary btn-sm">Add to Cart</a>
                        <a href="{{ route('books.book-detail', ['book' => $book->ISBN]) }}" class="btn btn-secondary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container mt-5">
    <h3>Authors</h3>
    <div class="row">
        @foreach ($authors as $author)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset($author->image) }}" class="card-img-top" alt="{{ $author->name }}">
                    <div class="card-body">
                        <p class="card-text">Written by: {{ $author->name . ' ' . $author->surname }}</p>
                        <a href="{{ route('authorDetails', ['author' => $author->authorId]) }}" class="btn btn-secondary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection
