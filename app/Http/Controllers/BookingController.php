<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_package_id' => 'required|exists:tour_packages,id',
            'travel_date' => 'required|date|after_or_equal:today',
            'adults_count' => 'required|integer|min:1',
            'children_count' => 'nullable|integer|min:0',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:30',
            'passport_number' => 'nullable|string|max:50',
            'special_requests' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);

        $package = TourPackage::findOrFail($validated['tour_package_id']);
        
        $adults = (int) $validated['adults_count'];
        $children = (int) ($validated['children_count'] ?? 0);
        
        // Calculate total price: adults full price, children 70% price
        $totalPrice = ($adults * $package->starting_price) + ($children * ($package->starting_price * 0.70));
        
        $bookingNumber = 'GT-' . date('Y') . '-' . strtoupper(Str::random(6));

        $booking = Booking::create([
            'booking_number' => $bookingNumber,
            'user_id' => Auth::check() ? Auth::id() : null,
            'tour_package_id' => $package->id,
            'travel_date' => $validated['travel_date'],
            'adults_count' => $adults,
            'children_count' => $children,
            'total_price' => $totalPrice,
            'paid_amount' => 0,
            'payment_status' => 'Pending',
            'booking_status' => 'Pending',
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'passport_number' => $validated['passport_number'] ?? null,
            'special_requests' => $validated['special_requests'] ?? null,
            'payment_method' => $validated['payment_method'],
        ]);

        return redirect()->route('booking.confirmation', $booking->booking_number)
            ->with('success', 'আপনার বুকিং অনুরোধটি সফলভাবে গ্রহন করা হয়েছে!');
    }

    public function confirmation($booking_number)
    {
        $booking = Booking::with('tourPackage.destination')->where('booking_number', $booking_number)->firstOrFail();
        return view('bookings.confirmation', compact('booking'));
    }

    public function processPayment(Request $request, $booking_number)
    {
        $booking = Booking::where('booking_number', $booking_number)->firstOrFail();

        $request->validate([
            'payment_method' => 'required|string',
            'transaction_id' => 'required|string|max:100',
        ]);

        $booking->update([
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
            'paid_amount' => $booking->total_price,
            'payment_status' => 'Paid',
            'booking_status' => 'Confirmed',
        ]);

        return redirect()->route('booking.invoice', $booking->booking_number)
            ->with('success', 'আপনার পেমেন্ট সফলভাবে সম্পন্ন হয়েছে এবং ট্রিপ বুকিং কনফার্ম করা হয়েছে!');
    }

    public function invoice($booking_number)
    {
        $booking = Booking::with(['tourPackage.destination', 'user'])->where('booking_number', $booking_number)->firstOrFail();
        return view('bookings.invoice', compact('booking'));
    }
}
