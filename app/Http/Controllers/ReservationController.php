<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Exports\ReservationExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reservations = Booking::orderBy('created_at', 'desc')->get();
        if($request->search){
            $reservations = Booking::where('check_in', $request->search)->orderBy('created_at', 'desc')->get();
        }
        return view('pages.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::all();
        return view('pages.reservation.create', compact('hotels'));
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
        $booking = Booking::create($dataBooking);
        if($booking) {
            Alert::success('Success', 'Reservation created successfully!');
            return redirect()->route('reservation.index');
        }
        Alert::error('Failed', 'Reservation creation failed!');
        return back();

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
        $reservation = Booking::find($id);
        $hotels = Hotel::all();
        return view('pages.reservation.update', compact('reservation', 'hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservation = Booking::find($id);
        $customer = Customer::find($reservation->customer_id);

        // Update Reservation
        $reservation->hotel_id = $request->hotel_id;
        $reservation->check_in = $request->check_in;
        $reservation->check_out = $request->check_out;
        $reservation->guests = $request->guests;
        $reservation->save();

        // Updatee Customer
        $customer->name = $request->name;
        $customer->addres = $request->address;
        $customer->phone = $request->phone;
        $customer->save();

        Alert::success('Success', 'Reservation updated successfully!');
        return redirect()->route('reservation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Booking::find($id);
        $reservation->delete();
        Alert::success('Success', 'Reservation deleted successfully!');
        return redirect()->route('reservation.index');
    }

    public function export() 
    {
        return Excel::download(new ReservationExport, now().'-reservation.xlsx');
    }
}
