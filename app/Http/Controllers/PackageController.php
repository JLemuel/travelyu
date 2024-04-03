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
        $package = Package::with('reviews.user')->findOrFail($id); // Use your model to retrieve the package by ID

        return view('packages.details', compact('package'));
    }

    public function search(Request $request)
    {
        $query = Package::query();

        if ($request->filled('destination')) {
            $query->whereHas('destination', function ($q) use ($request) {
                $q->where('city', $request->destination);
            });
        }

        // Filter by max price
        if ($request->filled('max_price')) {
            $maxPrice = $request->max_price;
            $query->where('price', '<=', $maxPrice);
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            // Assuming 'start_date' and 'end_date' are attributes of the Package model
            // and you want to include packages that either match the city or, if specified, the date range as well.
            $query->orWhere(function ($q) use ($startDate, $endDate) {
                $q->where('start_date', '<=', $endDate)
                    ->where('end_date', '>=', $startDate);
            });
        }

        $packages = $query->get();

        return view('search-results', compact('packages'));
    }
}
