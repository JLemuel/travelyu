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
        // Validate request data
        $validated = $request->validate([
            'destination' => 'string|nullable',
            'max_price' => 'numeric|nullable',
            'start_date' => 'date|nullable',
            'end_date' => 'date|nullable',
        ]);

        $query = Package::query();

        // Primary search criteria
        if (!empty($validated['destination'])) {
            // Assuming 'destinations' is the name of the pivot table and 'destination' the related model
            $query->whereHas('destinations', function ($q) use ($validated) {
                $q->where('city', $validated['destination']);
            });
        }

        // Secondary search criteria (price and dates)
        $query->where(function ($q) use ($validated) {
            if (!empty($validated['max_price'])) {
                $q->where('price', '<=', $validated['max_price']);
            }

            if (!empty($validated['start_date']) && !empty($validated['end_date'])) {
                $q->where('start_date', '<=', $validated['end_date'])
                    ->where('end_date', '>=', $validated['start_date']);
            }
        });

        $packages = $query->get();
        $isSuggestion = false;

        // Fallback for suggestions
        if ($packages->isEmpty()) {
            $similarPackagesQuery = $this->getSimilarPackagesQuery($validated);

            $packages = $similarPackagesQuery->take(5)->get(); // Example limit
            $isSuggestion = true;
        }

        return view('search-results', compact('packages', 'isSuggestion'));
    }


    protected function getSimilarPackagesQuery($validated)
    {
        $similarPriceRange = !empty($validated['max_price']) ? $validated['max_price'] * 1.2 : null;
        $similarPackagesQuery = Package::query();

        // Suggestion criteria based on destination
        if (!empty($validated['destination'])) {
            $similarPackagesQuery->whereHas('destination', function ($q) use ($validated) {
                $q->where('city', '!=', $validated['destination']);
            });
        }

        // Adjusting for price range in suggestions
        if ($similarPriceRange) {
            $similarPackagesQuery->where('price', '<=', $similarPriceRange);
        }

        // Adjusting for date range in suggestions
        if (!empty($validated['start_date']) && !empty($validated['end_date'])) {
            $similarPackagesQuery->where(function ($q) use ($validated) {
                $q->where('end_date', '>=', $validated['start_date'])
                    ->orWhere('start_date', '<=', $validated['end_date']);
            });
        }

        return $similarPackagesQuery;
    }
}
