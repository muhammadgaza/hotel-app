<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('pages.rooms.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'available' => 'required',
        ]);

        $hotel = Hotel::create($request->all());



        return redirect()->route('hotels')->with('success', 'Hotel created successfully.');

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
        $hotels = Hotel::find($id);
        return view('pages.rooms.update', compact('hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hotel = Hotel::find($id);

        $hotel->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('hotels')->with('success', 'Hotel updated successfully.');
    }

    public function updateAvailable(Request $request, $id)
    {
        $hotel = Hotel::find($id);

        $hotel->update([
            'available' => $request->available + $hotel->available,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
        return redirect()->route('hotels')->with('success', 'Hotel deleted successfully.');
    }
}
