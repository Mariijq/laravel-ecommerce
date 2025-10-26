@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5">
        <h2>Authors</h2>
        <div class="row">
            @foreach ($authors as $author)
                <a href="{{ route('authorDetails', ['author' => $author->authorId]) }}" class="col-md-4 mb-4 author-container">
                    <div class="card d-flex flex-row">
                        <img src="{{ asset($author->image) }}" class="card-img-left" alt="{{ $author->name }}" style="width: 150px; height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $author->name . ' ' . $author->surname }}</h5>
                            <p class="card-text">{{ $author->description }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
