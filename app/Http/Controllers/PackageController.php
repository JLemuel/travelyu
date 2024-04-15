<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (!Auth::check()) {
            // If not authenticated, redirect to login page
            return redirect()->route('login')->with('error', 'You need to login or register to book a package.');
        } else {
            $keyword = $request->input('keyword');

            $query = Package::search($keyword);

            $packages = $query->get();

            if ($request->has('locations')) {
                $locations = $request->input('locations');
                $packages = $packages->filter(function ($package) use ($locations) {
                    return $package->destinations->whereIn('city', $locations)->isNotEmpty();
                });
            }


            if ($request->has('destinations')) {
                $selectedDestinations = $request->input('destinations');
                $packages = $packages->filter(function ($package) use ($selectedDestinations) {
                    $packageDestinationNames = $package->destinations->pluck('name')->toArray();
                    return count(array_intersect($selectedDestinations, $packageDestinationNames)) > 0;
                });
            }

            if ($request->has('months')) {
                $selectedMonths = $request->input('months');
                $packages = $packages->filter(function ($package) use ($selectedMonths) {
                    $startMonth = date('F', strtotime($package->start_date));
                    return in_array($startMonth, $selectedMonths);
                });
            }
        }

        return view('search-results', compact('packages'));
    }
}
