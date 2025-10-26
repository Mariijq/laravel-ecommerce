<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Book;
use App\Models\Author;

class HomeController extends Controller
{
    public function index()
    {
        $sliders= Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $books = Book::take(3)->get();
        $authors = Author::take(3)->get();
        return view('frontend.home.home', compact('sliders', 'books', 'authors'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Search for books and authors based on the query
        $books = Book::where('title', 'like', "%$query%")->get();
        $authors = Author::where('name', 'like', "%$query%")->orWhere('surname', 'like', "%$query%")->get();
    
        return view('frontend.search.results', compact('books', 'authors', 'query'));
    }
    
    public function bookDetails($id)
    {
        $book = Book::findOrFail($id);
        return view('frontend.book-details', compact('book'));
    }

    public function authorDetails($id)
    {
        $author = Author::findOrFail($id);
        return view('frontend.author-details', compact('author'));
}


}
