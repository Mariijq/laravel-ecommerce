@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Show Book</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Book Details
                </div>
                <div class="card-body">
                    <ul>
                        <img src="{{ asset($book->image) }}" alt="" style="width: 200px" class="mx-auto d-block">
                        <li><strong>Title:</strong> {{ $book->title }}</li>
                        <li><strong>Author:</strong> {{ $book->author->name . ' ' . $book->author->surname }}</li>
                        <li><strong>Category:</strong> {{ $book->category->name }}</li>
                        <li><strong>Description:</strong></li>
                        <p>{!! nl2br(e($book->description)) !!}</p>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
