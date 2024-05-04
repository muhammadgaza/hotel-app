<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReservationExport implements FromView
{
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        $reservations = Booking::orderBy('check_in', 'desc')->get();
        if($search = request('search')){
            $reservations = Booking::where('check_in', $search)->orderBy('check_in', 'desc')->get();
        }
        return view('exports.reservation', compact('reservations'));
    }
}
