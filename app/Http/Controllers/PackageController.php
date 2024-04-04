<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function show(Package $package)
    {
        return view('packages.show', compact('package'));
    }

    public function showDetail($id)
    {
        $package = Package::with('reviews.user')->findOrFail($id); 

        return view('packages.details', compact('package'));
    }

    public function search(Request $request)
    {
        $query = Package::query();

        // Primary search criteria
        if ($request->filled('destination')) {
            $query->whereHas('destination', function ($q) use ($request) {
                $q->where('city', $request->destination);
            });
        }

        // Secondary search criteria (price and dates)
        $query->where(function ($q) use ($request) {
            if ($request->filled('max_price')) {
                $q->where('price', '<=', $request->max_price);
            }

            if ($request->filled('start_date') && $request->filled('end_date')) {
                $q->where(function ($subQuery) use ($request) {
                    $subQuery->where('start_date', '<=', $request->end_date)
                            ->where('end_date', '>=', $request->start_date);
                });
            }
        });

        $packages = $query->get();
        $isSuggestion = false;

        // Fallback for suggestions
        if ($packages->isEmpty()) {
            // Adjust this logic based on your application's needs
            $similarPriceRange = $request->filled('max_price') ? $request->max_price * 1.2 : null; // Example: widen the search by 20%
            $similarPackagesQuery = Package::query();

            // Suggestion criteria
            $similarPackagesQuery->when($request->filled('destination'), function ($q) use ($request) {
                $q->whereHas('destination', function ($subQuery) use ($request) {
                    // Exclude the originally searched city, you might want to include nearby cities here
                    $subQuery->where('city', '!=', $request->destination);
                });
            });

            // Adjusting for price range in suggestions
            if ($similarPriceRange) {
                $similarPackagesQuery->where('price', '<=', $similarPriceRange);
            }

            // Adjusting for date range in suggestions
            if ($request->filled('start_date') && $request->filled('end_date')) {
                $similarPackagesQuery->where(function ($q) use ($request) {
                    $q->where('end_date', '>=', $request->start_date) // Package ends after the start date
                    ->orWhere('start_date', '<=', $request->end_date); // Package starts before the end date
                });
            }

            $packages = $similarPackagesQuery->take(5)->get(); // Example limit
            $isSuggestion = true;
        }

        return view('search-results', compact('packages', 'isSuggestion'));
    }
}
