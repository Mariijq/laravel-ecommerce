<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Fetch cart items for the authenticated user
        $cartItems = CartItem::where('user_id', Auth::id())->with('book')->get();

        // Initialize variables for subtotal, tax, and total
        $subtotal = 0;
        $taxRate = 0.15; // 15%
        $tax = 0;
        $total = 0;

        // Loop through cart items to calculate subtotal and tax
        foreach ($cartItems as $cartItem) {
            $subtotal += $cartItem->quantity * $cartItem->book->init_price;
        }
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $tax;

        // Retrieve user address for the authenticated user
        $userAddress = UserAddress::where('user_id', Auth::id())->first();

        // Return the checkout view with necessary data
        return view('frontend.pages.checkout', compact('subtotal', 'tax', 'total', 'userAddress'));
    }

    public function storeAddress(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'country' => 'required|string',
            'state' => 'nullable|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'address' => 'required|string',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Create a new user address instance
        $address = new UserAddress();
        $address->user_id = $user->id;
        $address->name = $request->input('name');
        $address->phone = $request->input('phone');
        $address->email = $request->input('email');
        $address->country = $request->input('country');
        $address->state = $request->input('state');
        $address->city = $request->input('city');
        $address->zip = $request->input('zip');
        $address->address = $request->input('address');
        $address->save();

        // Redirect to the payment page
        return redirect()->route('admin.stripe.payment');
    }
}