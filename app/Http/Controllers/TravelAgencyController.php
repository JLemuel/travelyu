<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelAgency; // Assume you have this model
use App\Models\Package;       // Assume you have this model
use App\Models\User;

class TravelAgencyController extends Controller
{
    public function showPackages($id)
    {
        $agency = User::findOrFail($id);
        $packages = Package::where('travel_agency_id', $agency->id)->get();

        return view('agency-packages', compact('agency', 'packages'));
    }

    public function show($id)
    {
        $travelAgency = User::findOrFail($id);
        return view('travelAgency.show', compact('travelAgency'));
    }
}
