<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\TourCategory;
use App\Models\TourPackage;
use App\Models\VisaService;
use App\Models\Hotel;
use App\Models\BlogPost;
use App\Models\Review;
use App\Models\Faq;
use App\Models\GalleryItem;
use App\Models\NewsletterSubscriber;
use App\Models\CustomTourRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $popularDestinations = Destination::where('is_popular', true)->take(8)->get();
        $categories = TourCategory::where('is_featured', true)->get();
        $popularPackages = TourPackage::with('destination')->where('is_popular', true)->take(8)->get();
        $internationalPackages = TourPackage::with('destination')->where('is_international', true)->take(6)->get();
        $domesticPackages = TourPackage::with('destination')->where('is_domestic', true)->take(6)->get();
        $hajjUmrahPackages = TourPackage::with('destination')->where('is_hajj_umrah', true)->take(4)->get();
        $visas = VisaService::where('is_popular', true)->take(6)->get();
        $hotels = Hotel::with('destination')->where('is_featured', true)->take(4)->get();
        $blogs = BlogPost::latest()->take(3)->get();
        $reviews = Review::where('is_approved', true)->take(6)->get();
        $faqs = Faq::orderBy('order_index')->take(6)->get();
        $gallery = GalleryItem::take(6)->get();

        return view('home', compact(
            'popularDestinations',
            'categories',
            'popularPackages',
            'internationalPackages',
            'domesticPackages',
            'hajjUmrahPackages',
            'visas',
            'hotels',
            'blogs',
            'reviews',
            'faqs',
            'gallery'
        ));
    }

    public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        NewsletterSubscriber::create(['email' => $request->email]);

        return back()->with('success', 'ধন্যবাদ! ভ্রমণের আকর্ষণীয় অফার ও ডিল পেতে আপনার ইমেইলটি সাবস্ক্রাইব করা হয়েছে।');
    }

    public function requestCustomTour(Request $request)
    {
        $validated = $request->validate([
            'destination' => 'required|string|max:255',
            'travel_date' => 'nullable|date',
            'duration_days' => 'required|numeric|min:1',
            'budget_range' => 'nullable|string',
            'travelers_count' => 'required|numeric|min:1',
            'hotel_category' => 'nullable|string',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:30',
            'details' => 'nullable|string',
        ]);

        CustomTourRequest::create($validated);

        return back()->with('success', 'আপনার Custom Tour অনুরোধটি সফলভাবে জমা হয়েছে! আমাদের ট্রাভেল বিশেষজ্ঞ শীঘ্রই আপনার সাথে যোগাযোগ করবেন।');
    }

    public function about()
    {
        $reviews = Review::where('is_approved', true)->take(4)->get();
        return view('about', compact('reviews'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'ধন্যবাদ! আপনার বার্তাটি আমাদের কাছে পৌঁছেছে। দ্রুততম সময়ে আপনার প্রশ্নের উত্তর দেওয়া হবে।');
    }
}
