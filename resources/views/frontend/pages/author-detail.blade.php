@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4"> <!-- Increase the column width to col-md-6 -->
                <div class="card mx-auto"> <!-- Add mx-auto class to center the card -->
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <img src="{{ asset($authors->image) }}" class="card-img" alt="{{ $authors->name }}">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $authors->name . ' ' . $authors->surname }}</h5>
                                <p class="card-text">{!! nl2br(e($authors->bio)) !!}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('authorsHome') }}" class="btn btn-secondary btn-sm">Back to Authors</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
