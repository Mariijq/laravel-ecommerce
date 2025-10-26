<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Author;

class AuthorHomeController extends Controller
{
    public function index(){
        $authors = Author::all();
        return view('frontend.pages.authorsHome', compact('authors'));

    }

    public function authorDetails($bookId)
    {
        
        $authors = Author::find($bookId);
    
        // Check if the book is found
        if (!$authors) {
            abort(404); // or handle the situation where the book is not found
        }
    
        return view('frontend.pages.author-detail', compact('authors'));
    }
    
}
