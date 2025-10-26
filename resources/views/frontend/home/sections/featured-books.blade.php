<!-- frontend.home.home.blade.php -->


<div class="container mt-5">
    <h2>Featured Books</h2>
    <div class="row grid" style="position: relative; height: auto;">
        @foreach ($books as $book)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4" style="position: relative;">
                <a class="wsus__hot_deals__single" href="{{ route('books.book-detail', ['book' => $book->ISBN]) }}">

                <div class="wsus__hot_deals__single">
                    <div class="wsus__hot_deals__single_img">
                        <img src="{{ asset($book->image) }}" alt="book" class="img-fluid w-100" oncontextmenu="return false;">
                    </div>
                    <div class="wsus__hot_deals__single_text">
                        <h3>{{ $book->title }}</h3>
                        <p>written by: {{ $book->author->name . ' ' . $book->author->surname }}</p>
                        <p>Status: {{ $book->status }}</p>
                        
                    </div>
                </div>
                </a>
            </div>
        @endforeach
    </div>
</div>