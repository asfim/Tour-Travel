<?php

namespace App\Http\Controllers;

use App\Models\FlightBookingRequest;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        return view('flights.index');
    }

    public function requestBooking(Request $request)
    {
        $validated = $request->validate([
            'from_location' => 'required|string|max:255',
            'to_location' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:departure_date',
            'trip_type' => 'required|string',
            'passengers_count' => 'required|integer|min:1',
            'cabin_class' => 'required|string',
            'passenger_name' => 'required|string|max:255',
            'passenger_phone' => 'required|string|max:30',
            'passenger_email' => 'required|email|max:255',
            'notes' => 'nullable|string',
        ]);

        FlightBookingRequest::create($validated);

        return back()->with('success', 'আপনার ফ্লাইট টিকেট বুকিং রিকোয়েস্ট সফলভাবে গৃহীত হয়েছে! আমাদের টিকিটিং ডেস্ক থেকে শীঘ্রই ফোন করা হবে।');
    }
}
