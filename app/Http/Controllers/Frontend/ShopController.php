<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class ShopController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('frontend.pages.shop', compact('books'));
    }


}
