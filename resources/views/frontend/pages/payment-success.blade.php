@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="text-center mt-5">
                    <img src="{{ asset('frontend/images/success-icon-10-300x300.png') }}" alt="Success" style="width: 200px;">
                    <h2 class="mt-3">Payment Successful!</h2>

                    <p>Your order has been successfully processed.</p>
                    
                    <p>Thank you for shopping with us.</p>
                </div>
            </div>
        </div>
    </div>
@endsection