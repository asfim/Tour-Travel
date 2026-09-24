<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\TourPackage;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::withCount('packages')->get();
        return view('destinations.index', compact('destinations'));
    }

    public function show($slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();
        $packages = TourPackage::where('destination_id', $destination->id)->paginate(6);
        return view('destinations.show', compact('destination', 'packages'));
    }
}
