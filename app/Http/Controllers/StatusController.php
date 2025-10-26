<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ShippingRule;

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

    public function changeRuleStatus(Request $request)
    {
        $shipping = ShippingRule::findOrFail($request->id);
        $shipping->status = $request->status == 'true' ? 1 : 0;
        $shipping->save();

        return response(['message' => 'Status has been updated!']);
    }
}
