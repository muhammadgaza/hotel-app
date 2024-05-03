<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the request is empty
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        // Create a new customer
        $dataCustomer = Customer::create([
            'name' => $request->name,
            'addres' => $request->address,
            'phone' => $request->phone,
        ]);

        $dataBooking = $request->validate([
            'hotel_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'guests' => 'required',
        ]);

        $dataBooking['customer_id'] = $dataCustomer->id;

        // Create a new booking
        Booking::create($dataBooking);

        return redirect()->route('hotels');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
