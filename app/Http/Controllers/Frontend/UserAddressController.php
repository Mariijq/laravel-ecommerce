<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            // Handle unauthenticated user (redirect to login or show an error message)
            return redirect()->route('login')->with('error', 'Please log in to view your addresses.');
        }

        // Fetch addresses for the authenticated user
        $addresses = UserAddress::where('user_id', $user->userId)->get();

        // Store addresses in the session as an array
        Session::put('user_addresses', $addresses->toArray());

        return view('frontend.dashboard.address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.dashboard.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            // Handle unauthenticated user (redirect to login or show an error message)
            return redirect()->route('login')->with('error', 'Please log in to create an address.');
        }

        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'max:200', 'email'],
            'phone' => ['required', 'max:200'],
            'country' => ['required', 'max:200'],
            'state' => ['required', 'max:200'],
            'city' => ['required', 'max:200'],
            'zip' => ['required', 'max:200'],
            'address' => ['required'],
        ]);

        $address = new UserAddress();
        $address->user_id = Auth::user()->userId;
        $address->name = $request->name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->address = $request->address;
        $address->save();

        // Append the new address to the existing addresses array in the session
        $userAddresses = Session::get('user_addresses', []);
        $userAddresses[] = $address->toArray();
        Session::put('user_addresses', $userAddresses);

        toastr('Created Successfully!', 'success', 'Success');

        return redirect()->route('user.address.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // You can implement this if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $address = UserAddress::findOrFail($id);
        return view('frontend.dashboard.address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();

        if (!$user) {
            // Handle unauthenticated user (redirect to login or show an error message)
            return redirect()->route('login')->with('error', 'Please log in to update an address.');
        }

        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'max:200', 'email'],
            'phone' => ['required', 'max:200'],
            'country' => ['required', 'max:200'],
            'state' => ['required', 'max:200'],
            'city' => ['required', 'max:200'],
            'zip' => ['required', 'max:200'],
            'address' => ['required'],
        ]);

        $address = UserAddress::findOrFail($id);
        $address->user_id = Auth::user()->userId;
        $address->name = $request->name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->address = $request->address;
        $address->save();

        // Update the existing address in the addresses array in the session
        $userAddresses = Session::get('user_addresses', []);
        $updatedIndex = array_search($id, array_column($userAddresses, 'id'));
        if ($updatedIndex !== false) {
            $userAddresses[$updatedIndex] = $address->toArray();
            Session::put('user_addresses', $userAddresses);
        }

        toastr('Updated Successfully!', 'success', 'Success');

        return redirect()->route('user.address.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $address = UserAddress::findOrFail($id);
        $address->delete();

        // Remove the deleted address from the addresses array in the session
        $userAddresses = Session::get('user_addresses', []);
        $deletedIndex = array_search($id, array_column($userAddresses, 'id'));
        if ($deletedIndex !== false) {
            unset($userAddresses[$deletedIndex]);
            Session::put('user_addresses', array_values($userAddresses)); // Reindex the array
        }

        // If the deleted address is the selected shipping address, remove it from the session
        $selectedAddressId = optional(Session::get('selected_shipping_address'))->id;
        if ($selectedAddressId == $id) {
            Session::forget('selected_shipping_address');
        }

        return redirect()->route('user.address.index')->with('success', 'Address deleted successfully!');
    }
}
