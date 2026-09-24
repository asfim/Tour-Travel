<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TourPackage;
use App\Models\Destination;
use App\Models\TourCategory;
use App\Models\User;
use App\Models\VisaService;
use App\Models\FlightBookingRequest;
use App\Models\Hotel;
use App\Models\BlogPost;
use App\Models\Coupon;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscriber;
use App\Models\Review;
use App\Models\Faq;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('booking_status', 'Pending')->count();
        $confirmedBookings = Booking::where('booking_status', 'Confirmed')->count();
        $cancelledBookings = Booking::where('booking_status', 'Cancelled')->count();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalRevenue = Booking::where('payment_status', 'Paid')->sum('total_price');

        $popularPackages = TourPackage::where('is_popular', true)->take(5)->get();
        $recentBookings = Booking::with(['user', 'tourPackage'])->latest()->take(7)->get();

        return view('admin.dashboard', compact(
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'cancelledBookings',
            'totalCustomers',
            'totalRevenue',
            'popularPackages',
            'recentBookings'
        ));
    }

    // Bookings Management
    public function bookings()
    {
        $bookings = Booking::with(['tourPackage', 'user'])->latest()->paginate(15);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateBookingStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $request->validate([
            'booking_status' => 'required|string',
            'payment_status' => 'required|string',
        ]);

        $booking->update([
            'booking_status' => $request->booking_status,
            'payment_status' => $request->payment_status,
        ]);

        return back()->with('success', 'বুকিং স্ট্যাটাস সফলভাবে আপডেট করা হয়েছে!');
    }

    // Packages Management
    public function packages()
    {
        $packages = TourPackage::with('destination')->latest()->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    public function createPackage()
    {
        $destinations = Destination::all();
        $categories = TourCategory::all();
        return view('admin.packages.create', compact('destinations', 'categories'));
    }

    public function storePackage(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'destination_id' => 'required|exists:destinations,id',
            'category_id' => 'nullable|exists:tour_categories,id',
            'duration_days' => 'required|integer',
            'duration_nights' => 'required|integer',
            'starting_price' => 'required|numeric',
            'original_price' => 'nullable|numeric',
            'short_description' => 'required|string',
            'overview' => 'required|string',
            'cover_image' => 'required|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(4);
        $validated['itinerary'] = [
            ['day' => 1, 'title' => 'Arrival & Transfer', 'description' => 'Hotel check-in and leisure.'],
            ['day' => 2, 'title' => 'City Tour', 'description' => 'Guided sightseeing.'],
        ];
        $validated['inclusions'] = ['4-Star Hotel Stay', 'Daily Breakfast', 'Airport Transfers'];
        $validated['exclusions'] = ['Personal Expenses', 'Flight tickets'];

        TourPackage::create($validated);

        return redirect()->route('admin.packages')->with('success', 'নতুন ট্যুর প্যাকেজ সফলভাবে তৈরি হয়েছে!');
    }

    // Destinations Management
    public function destinations()
    {
        $destinations = Destination::latest()->paginate(10);
        return view('admin.destinations.index', compact('destinations'));
    }

    // Visas Management
    public function visas()
    {
        $visas = VisaService::latest()->paginate(10);
        return view('admin.visas.index', compact('visas'));
    }

    // Flights Requests
    public function flights()
    {
        $flights = FlightBookingRequest::latest()->paginate(15);
        return view('admin.flights.index', compact('flights'));
    }

    // Hotels Management
    public function hotels()
    {
        $hotels = Hotel::with('destination')->latest()->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    // Customers Management
    public function customers()
    {
        $customers = User::where('role', 'customer')->latest()->paginate(15);
        return view('admin.customers.index', compact('customers'));
    }

    // Coupons Management
    public function coupons()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index', compact('coupons'));
    }

    // Messages & Subscribers
    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(15);
        return view('admin.messages.index', compact('messages'));
    }

    public function subscribers()
    {
        $subscribers = NewsletterSubscriber::latest()->paginate(20);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    // Website Settings
    public function settings()
    {
        return view('admin.settings.index');
    }
}
