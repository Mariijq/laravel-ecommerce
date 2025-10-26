<?php

namespace App\Listeners;

use App\Events\ShippingAddressSelected;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session; // Import the Session facade

class SaveShippingAddressToSession
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ShippingAddressSelected $event): void
    {
        Session::put('selected_shipping_address', $event->userAddress);
    }
}
