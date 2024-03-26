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

}
