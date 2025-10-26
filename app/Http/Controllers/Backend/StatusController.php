<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function changeBookStatus(Request $request)
    {
        $book = Book::findOrFail($request->id);
        $book->status = $request->status ? 1 : 0;
        $book->save();
    
        return response(['message' => 'Status has been updated!']);

    }
}
