 <!--============================
        MAIN MENU START
    ==============================-->
    <nav class="wsus__main_menu d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="relative_contect d-flex">
                        <div class="wsus_menu_category_bar">
                            <i class="far fa-bars"></i>
                        </div>
                        <ul class="wsus_menu_cat_item show_home toggle_menu">
                            <li><a href="{{ route('books.by.category', ['category' => 1]) }}"><i class="fas fa-star"></i> Romance</a></li>
                            <li><a href="{{ route('books.by.category', ['category' => 2]) }}"><i class="fas fa-star"></i> History</a></li>
                            <li><a href="{{ route('books.by.category', ['category' => 3]) }}"><i class="fas fa-star"></i> Thriller</a></li>
                            <li><a href="{{ route('books.by.category', ['category' => 4]) }}"><i class="fas fa-star"></i> Mystery</a></li>
                            <li><a href="{{ route('books.by.category', ['category' => 5]) }}"><i class="fas fa-star"></i> Sci-Fi</a></li>
                            <li><a href="{{ route('books.by.category', ['category' => 7]) }}"><i class="fas fa-star"></i> Psychological</a></li>
                            <li><a href="{{ route('books.by.category', ['category' => 8]) }}"><i class="fas fa-star"></i> Autobioraphy</a></li>

                        </ul>
                        <ul class="wsus__menu_item">
                            <li><a class="active" href="{{route('home')}}">home</a></li>
                            <li><a href="{{route('shop')}}">shop</a></li>
                            <li><a href="{{route('authorsHome')}}">Authors</a></li>
    
                        </ul>
                        <ul class="wsus__menu_item wsus__menu_item_right">
                            <li><a href="contact.html">contact</a></li>
                            <li><a href="{{ auth()->check() && auth()->user()->isAdmin() ? route('admin.dashbaord') : route('user.user.dashboard') }}">my account</a></li>
                            <li><a href="{{route('login')}}">login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--============================
        MAIN MENU END
    ==============================-->
    
    
    <!--============================
        MOBILE MENU START
    ==============================-->
<section id="wsus__mobile_menu">
    <span class="wsus__mobile_menu_close"><i class="fal fa-times"></i></span>
    <ul class="wsus__mobile_menu_header_icon d-inline-flex">
        <li><a href="wishlist.html"><i class="far fa-heart"></i> <span>2</span></a></li>
        <li><a href="compare.html"><i class="far fa-random"></i> </i><span>3</span></a></li>
    </ul>
    <form>
        <input type="text" placeholder="Search">
        <button type="submit"><i class="far fa-search"></i></button>
    </form>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                role="tab" aria-controls="pills-home" aria-selected="true">Categories</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                role="tab" aria-controls="pills-profile" aria-selected="false">Main Menu</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="wsus__mobile_menu_main_menu">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <ul class="wsus_mobile_menu_category">
                        <li><a href="{{ route('books.by.category', ['category' => 1]) }}"><i class="fas fa-star"></i> Romance</a></li>
                        <li><a href="{{ route('books.by.category', ['category' => 2]) }}"><i class="fas fa-star"></i> History</a></li>
                        <li><a href="{{ route('books.by.category', ['category' => 3]) }}"><i class="fas fa-star"></i> Thriller</a></li>
                        <li><a href="{{ route('books.by.category', ['category' => 4]) }}"><i class="fas fa-star"></i> Mystery</a></li>
                        <li><a href="{{ route('books.by.category', ['category' => 5]) }}"><i class="fas fa-star"></i> Sci-Fi</a></li>
                        <li><a href="{{ route('books.by.category', ['category' => 7]) }}"><i class="fas fa-star"></i> Psychological</a></li>
                        <li><a href="{{ route('books.by.category', ['category' => 8]) }}"><i class="fas fa-star"></i> Autobioraphy</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="wsus__mobile_menu_main_menu">
                <div class="accordion accordion-flush" id="accordionFlushExample2">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="track_order.html">Track Order</a></li>
                        <li><a href="daily_deals.html">Daily Deals</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
    MOBILE MENU END
==============================-->
