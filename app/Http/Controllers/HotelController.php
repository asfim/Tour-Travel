<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Destination;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::with('destination');

        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        $hotels = $query->paginate(9);
        $destinations = Destination::all();

        return view('hotels.index', compact('hotels', 'destinations'));
    }

    public function show($slug)
    {
        $hotel = Hotel::with('destination')->where('slug', $slug)->firstOrFail();
        return view('hotels.show', compact('hotel'));
    }
}
