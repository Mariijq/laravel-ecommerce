@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Show Author</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Author Details
                </div>
                <div class="card-body">
                    <div>
                        <img src="{{ asset($author->image) }}" alt="Author Image" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                    <p><strong>Name:</strong> {{ $author->name }}</p>
                    <p><strong>Surname:</strong> {{ $author->surname }}</p>
                    <p><strong>Bio:</strong> {!! nl2br(e($author->bio)) !!}</p>
                    <p><strong>Created At:</strong> {{ $author->created_at->format('Y-m-d H:i:s') }}</p>
                    <p><strong>Updated At:</strong> {{ $author->updated_at->format('Y-m-d H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
