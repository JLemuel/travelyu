<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination; // Make sure to import your Destination model

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all(); // Fetch all destinations from the database

        return view('destinations.index', compact('destinations')); // Return the view with the destinations data
    }

    public function show($destination, $destinationId) // Route Model Binding
    {
        $destination = Destination::find($destinationId); // Find the destination by ID
        // dd($destination); // Debugging: dump the destination to see if it's found
        return view('destinations.show', compact('destination'));
    }

    public function showDestinations($cityName) // Using the city name as a parameter0
    {
        // Find destinations by city name.
        $destinations = Destination::where('city', 'like', "%{$cityName}%")->get();

        // If no destinations are found, you might want to handle this case,
        // e.g., show a "not found" view or redirect with a flash message.

        // if ($destinations->isEmpty()) {
        //     // Handle the case when no destinations are found
        //     // For example:
        //     return redirect()->route('some.route')->with('error', 'No destinations found in this city.');
        // }

        // If destinations are found, pass them to your view
        return view('destinations.index', [
            'destinations' => $destinations,
            'cityName' => $cityName
        ]);
    }
}