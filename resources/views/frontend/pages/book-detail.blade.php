@extends('frontend.layouts.master')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
           
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img src="{{ asset($book->image) }}" alt="{{ $book->title }}" class="img-responsive img-fluid" style="width: 70%;"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h3 class="card-title">{{ $book->title }}</h3>
                    <h6 class="card-subtitle">Written by: {{ $book->author->name . ' ' . $book->author->surname }}</h6>
                    <p>{!! nl2br(e($book->description)) !!}</p>
                    <h2 class="mt-5">
                        ${{ $book->init_price }}
                    </h2>
                    <a href="{{ route('add-to-cart', $book->ISBN) }}" class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                    <h3 class="box-title mt-5">Key Highlights</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i>Great read with a compelling storyline</li>
                        <li><i class="fa fa-check text-success"></i>Available for fast and reliable shipping</li>
                        <li><i class="fa fa-check text-success"></i>No additional taxes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
