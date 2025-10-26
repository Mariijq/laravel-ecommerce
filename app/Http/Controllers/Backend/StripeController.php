<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\CartItem;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function payment(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // Fetch necessary data from your database or any other source
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        $lineItems = [];

        // Loop through cart items to create line items for the Stripe session
        foreach ($cartItems as $cartItem) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $cartItem->book->title, // Replace with actual product name field
                    ],
                    'unit_amount' => $cartItem->price * 100, // Convert price to cents
                ],
                'quantity' => $cartItem->quantity,
            ];
        }

        // Create the Stripe session with dynamic line items
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);

        // Retrieve the total price from the request
        $totalPrice = $request->input('total');

        // Get the authenticated user
        $user = Auth::user();

        // Create a new order
        $order = new Order();
        $order->user_id = $user->userId;
        $order->payment_type = 'Stripe'; // Or any other payment type logic you have
        $order->total_price = $totalPrice;
        $order->save();

        // Get the cart items for the user
        $cartItems = CartItem::where('user_id', $user->userId)->with('book')->get();

        // Loop through the cart items and create order details for each item
        foreach ($cartItems as $cartItem) {
            $orderDetail = new OrderDetails();
            $orderDetail->order_id = $order->orderId;
            $orderDetail->book_id = $cartItem->book->ISBN;
            $orderDetail->book_name = $cartItem->book->title;
            $orderDetail->price = $cartItem->book->init_price;
            $orderDetail->quantity = $cartItem->quantity;
            $orderDetail->save();
        }

        // Clear the user's cart after placing the order
        CartItem::where('user_id', $user->userId)->delete();

        // Redirect the user to the Stripe checkout session URL
        return redirect()->away($session->url);
    }


    public function success()
    {

        return view('frontend.pages.payment-success');
    }

    public function cancel()
    {
        // Handle cancellation logic here
    }
}