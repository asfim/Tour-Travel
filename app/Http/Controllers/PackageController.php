<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use App\Models\Destination;
use App\Models\TourCategory;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = TourPackage::with(['destination', 'category']);

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('short_description', 'like', "%{$keyword}%")
                  ->orWhere('overview', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('destination')) {
            $query->whereHas('destination', function ($q) use ($request) {
                $q->where('slug', $request->destination);
            });
        }

        if ($request->filled('category')) {
            $categorySlug = $request->category;
            if ($categorySlug === 'domestic-tours') {
                $query->where('is_domestic', true);
            } elseif ($categorySlug === 'international-tours') {
                $query->where('is_international', true);
            } elseif ($categorySlug === 'hajj-umrah') {
                $query->where('is_hajj_umrah', true);
            } else {
                $query->whereHas('category', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                });
            }
        }

        if ($request->filled('type')) {
            if ($request->type === 'domestic') {
                $query->where('is_domestic', true);
            } elseif ($request->type === 'international') {
                $query->where('is_international', true);
            } elseif ($request->type === 'hajj_umrah') {
                $query->where('is_hajj_umrah', true);
            }
        }

        if ($request->filled('max_price')) {
            $query->where('starting_price', '<=', $request->max_price);
        }

        if ($request->filled('sort')) {
            if ($request->sort === 'price_low') {
                $query->orderBy('starting_price', 'asc');
            } elseif ($request->sort === 'price_high') {
                $query->orderBy('starting_price', 'desc');
            } elseif ($request->sort === 'rating') {
                $query->orderBy('rating', 'desc');
            } else {
                $query->latest();
            }
        } else {
            $query->latest();
        }

        $packages = $query->paginate(9)->withQueryString();
        $destinations = Destination::orderBy('name')->get();
        $categories = TourCategory::orderBy('name')->get();

        return view('packages.index', compact('packages', 'destinations', 'categories'));
    }

    public function show($slug)
    {
        $package = TourPackage::with(['destination', 'category'])->where('slug', $slug)->firstOrFail();
        $relatedPackages = TourPackage::where('destination_id', $package->destination_id)
            ->where('id', '!=', $package->id)
            ->take(3)
            ->get();

        return view('packages.show', compact('package', 'relatedPackages'));
    }
}
