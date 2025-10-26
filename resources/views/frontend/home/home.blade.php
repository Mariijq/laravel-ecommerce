  @extends('frontend.layouts.master')

  @section('content')
  <!--==========================
      PRODUCT MODAL VIEW START
    ===========================-->
    <section class="product_popup_modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="far fa-times"></i></button>
                        <div class="row">
                            <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                <div class="wsus__quick_view_img">
                                    <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                        href="https://youtu.be/7m16dFI1AF8">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    <div class="row modal_slider">
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="images/zoom1.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="images/zoom2.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="images/zoom3.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="images/zoom4.jpg" alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
      PRODUCT MODAL VIEW END
    ===========================-->


  
    @include('frontend.home.sections.banner-slider')
 
    @include('frontend.home.sections.featured-books')

    @include('frontend.home.sections.featured-authors')




    <!--============================
      HOME SERVICES START
    ==============================-->
    <section id="wsus__home_services" class="home_service_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-lg-3 pe-lg-0">
                    <div class="wsus__home_services_single home_service_single_2 border_left">
                        <i class="fal fa-truck"></i>
                        <h5>Free Worldwide Shipping</h5>
                        <p>Free shipping coast for all country</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3 pe-lg-0">
                    <div class="wsus__home_services_single home_service_single_2">
                        <i class="fal fa-headset"></i>
                        <h5>24/7 Customer Support</h5>
                        <p>Friendly 24/7 customer support</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3 pe-lg-0">
                    <div class="wsus__home_services_single home_service_single_2">
                        <i class="far fa-exchange-alt"></i>
                        <h5>Money Back Guarantee</h5>
                        <p>We return money within 30 days</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3">
                    <div class="wsus__home_services_single home_service_single_2">
                        <i class="fal fa-credit-card"></i>
                        <h5>Secure Online Payment</h5>
                        <p>We posess SSL / Secure Certificate</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        HOME SERVICES END
    ==============================-->

    @endsection