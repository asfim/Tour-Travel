<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerDashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $totalBookings = Booking::where('user_id', $user->id)->count();
        $pendingBookings = Booking::where('user_id', $user->id)->where('booking_status', 'Pending')->count();
        $confirmedTrips = Booking::where('user_id', $user->id)->where('booking_status', 'Confirmed')->count();
        $pendingPayments = Booking::where('user_id', $user->id)->where('payment_status', 'Pending')->count();

        $recentBookings = Booking::with('tourPackage')->where('user_id', $user->id)->latest()->take(5)->get();

        return view('customer.dashboard', compact(
            'totalBookings',
            'pendingBookings',
            'confirmedTrips',
            'pendingPayments',
            'recentBookings'
        ));
    }

    public function bookings()
    {
        $bookings = Booking::with('tourPackage.destination')->where('user_id', Auth::id())->latest()->paginate(10);
        return view('customer.bookings', compact('bookings'));
    }

    public function bookingDetails($id)
    {
        $booking = Booking::with('tourPackage.destination')->where('user_id', Auth::id())->findOrFail($id);
        return view('customer.booking-details', compact('booking'));
    }

    public function payments()
    {
        $bookings = Booking::with('tourPackage')->where('user_id', Auth::id())->latest()->paginate(10);
        return view('customer.payments', compact('bookings'));
    }

    public function invoices()
    {
        $bookings = Booking::with('tourPackage')->where('user_id', Auth::id())->latest()->get();
        return view('customer.invoices', compact('bookings'));
    }

    public function documents()
    {
        $user = Auth::user();
        return view('customer.documents', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('customer.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'address' => 'nullable|string|max:255',
            'passport_number' => 'nullable|string|max:50',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'passport_number' => $request->passport_number,
        ]);

        return back()->with('success', 'প্রোফাইল তথ্য সফলভাবে আপডেট হয়েছে!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'বর্তমান পাসওয়ার্ডটি সঠিক নয়।']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'পাসওয়ার্ড সফলভাবে পরিবর্তন করা হয়েছে!');
    }

    public function support()
    {
        return view('customer.support');
    }
}
