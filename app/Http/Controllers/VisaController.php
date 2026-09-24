<?php

namespace App\Http\Controllers;

use App\Models\VisaService;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function index()
    {
        $visas = VisaService::all();
        return view('visa.index', compact('visas'));
    }

    public function show($slug)
    {
        $visa = VisaService::where('slug', $slug)->firstOrFail();
        return view('visa.show', compact('visa'));
    }

    public function apply(Request $request)
    {
        $request->validate([
            'country' => 'required|string',
            'visa_type' => 'required|string',
            'applicant_name' => 'required|string|max:255',
            'applicant_phone' => 'required|string|max:30',
            'applicant_email' => 'required|email|max:255',
        ]);

        return back()->with('success', 'আপনার ভিসা প্রসেসিং রিকোয়েস্টটি সফলভাবে জমা নেওয়া হয়েছে! আমাদের ভিসা কনসালটেন্ট আপনার সাথে যোগাযোগ করবেন।');
    }
}
