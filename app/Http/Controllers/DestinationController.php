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

    public function show(Destination $destination) // Route Model Binding
    {
        return view('destinations.show', compact('destination'));
    }
}