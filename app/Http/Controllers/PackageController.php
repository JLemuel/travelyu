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
}
