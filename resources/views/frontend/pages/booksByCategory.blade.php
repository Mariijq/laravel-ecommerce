@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h2 class="mt-4 mb-4">{{ $category->name }} Books</h2>

        <div class="row">
            @forelse ($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($book->image) }}" class="card-img-top" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">Author: {{ $book->author->name }} {{ $book->author->surname }}</p>
                            <p class="card-text">Category: {{ $book->category->name }}</p>
                            <p class="card-text">Publishing Year: {{ $book->publishing_year }}</p>
                            <p class="card-text">Price: ${{ $book->init_price }}</p>
                            <a href="{{ route('books.book-detail', $book->ISBN) }}" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No books available in this category.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
