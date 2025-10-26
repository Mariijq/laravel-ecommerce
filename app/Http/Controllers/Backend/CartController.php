<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Cart;


class CartController extends Controller
{
    public function cart()
    {
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->userId)->with('book')->get();

        return view('frontend.pages.cart', compact('cartItems'));
    }

    public function addToCart($id)
{
    // Check if the user is authenticated
    if (!Auth::check()) {
        // If not authenticated, redirect to the login page
        return redirect()->route('login')->with('error', 'Please log in to add items to the cart.');
    }

    $user = Auth::user();
    $book = Book::findOrFail($id); 

    $cartItem = CartItem::where('user_id', $user->userId)
        ->where('book_id', $id)
        ->first();

    if ($cartItem) {
        // If item exists, update the quantity and total price in the database
        $cartItem->increment('quantity');
        $cartItem->update(['price' => $cartItem->quantity * $book->init_price]); // Update total price
    } else {
        // If item does not exist, create a new cart item in the database
        $cartItem = new CartItem();
        $cartItem->user_id = $user->userId;
        $cartItem->book_id = $book->ISBN;
        $cartItem->name = $book->title; // Save the book title
        $cartItem->quantity = 1;
        $cartItem->price = $book->init_price; // Set price to the price of the book
        $cartItem->save();
    }
    return redirect()->back()->with('success', 'Book is added to the cart');
}

public function qtyIncrement($id)
{
    $user = Auth::user();
    
    // Find the cart item with the given ID for the authenticated user
    $cartItem = CartItem::where('user_id', $user->userId)
        ->where('id', $id)
        ->firstOrFail();

    // Increment the quantity
    $newQuantity = $cartItem->quantity + 1;
    $cartItem->update(['quantity' => $newQuantity]);

    // Redirect back to the cart page with a success message
    return redirect()->route('cart')->with('success', 'Quantity incremented successfully');
}


    public function qtyDecrement($id)
    {
        $user = Auth::user();
        $cartItem = CartItem::where('user_id', $user->userId)
            ->where('id', $id)
            ->firstOrFail();

        // Decrement the quantity, ensuring it's at least 1
        $newQuantity = max(1, $cartItem->quantity - 1);
        $cartItem->update(['quantity' => $newQuantity]);

        // If the new quantity is less than or equal to 0, remove the item from the cart
        if ($newQuantity <= 0) {
            $cartItem->delete();
            return redirect()->route('cart')->with('success', 'Item removed from the cart');
        }

        return redirect()->route('cart')->with('success', 'Quantity decremented successfully');
    }

    public function updateCart($id)
    {
        $user = Auth::user();
        $cartItem = CartItem::where('user_id', $user->userId)
            ->where('id', $id)
            ->firstOrFail();

        request()->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        // Update the quantity
        $cartItem->update(['quantity' => request('quantity')]);

        return redirect()->route('cart')->with('success', 'Cart updated successfully');
    }

    public function removeBook($id)
    {
        $user = Auth::user();
        $cartItem = CartItem::where('user_id', $user->userId)
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->delete();

        return redirect()->route('cart')->with('success', 'Book removed from the cart');
    }
}