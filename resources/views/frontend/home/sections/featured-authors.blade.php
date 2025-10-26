<div class="container mt-5">
    <h2>Featured Authors</h2>
    <div class="row grid" style="position: relative; height: auto;">
        @foreach ($authors as $author)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4" style="position: relative;">
                <a class="wsus__hot_deals__single" href="{{ route('authorDetails', ['author' => $author->authorId]) }}">
                    <div class="wsus__hot_deals__single_img">
                        <img src="{{ asset($author->image) }}" alt="book" class="img-fluid w-100" oncontextmenu="return false;">
                    </div>
                    <div class="wsus__hot_deals__single_text">
                        <h2>{{ $author->name . ' ' . $author->surname }}</h2>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
