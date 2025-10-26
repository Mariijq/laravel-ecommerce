@extends('frontend.layouts.master')

@section('title')
    Checkout 
@endsection

@section('content')
    <!--============================
        BREADCRUMB START
    {{-- ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="{{ route('user.checkout') }}">check out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================ --}}
        BREADCRUMB END
    ==============================-->

    <!--============================
        CHECK OUT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="wsus__check_form">
                        <div class="d-flex">
                                <h5>Shipping Details </h5>                            
                        </div>
                        <div class="wsus__check_form mt-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Name" name="name" value="{{ old('name', $userAddress ? $userAddress->name : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Phone *" name="phone" value="{{ old('phone', $userAddress ? $userAddress->phone : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="email" placeholder="Email *" name="email" value="{{ old('email', $userAddress ? $userAddress->email : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Country *" name="country" value="{{ old('country', $userAddress ? $userAddress->country : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="State" name="state" value="{{ old('state', $userAddress ? $userAddress->state : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Town / City *" name="city" value="{{ old('city', $userAddress ? $userAddress->city : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Zip *" name="zip" value="{{ old('zip', $userAddress ? $userAddress->zip : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Address *" name="address" value="{{ old('address', $userAddress ? $userAddress->address : '') }}">
                                        </div>
                                    </div>
                                   
                                </div>                        
                            </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="wsus__order_details" id="sticky_sidebar">
                        <!-- Order Summary -->
                        <div class="wsus__order_details_summery">
                            <h6>Order Summary</h6>
                            <p>Subtotal: <span>${{ number_format($subtotal, 2) }}</span></p>
                            <p>Delivery: <span>${{ number_format($tax, 2) }}</span></p>
                            <p><b>Total:</b> <span>${{ number_format($total, 2) }}</span></p>
                            <!-- Checkout Form -->
                            <form action="{{ route('admin.stripe.payment') }}" method="POST">
                                @csrf
                                <!-- Include hidden input field for total price -->
                                <input type="hidden" name="total" value="{{ $total }}">
                                <!-- Other form fields -->
                                <button type="submit" class="common_btn">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection