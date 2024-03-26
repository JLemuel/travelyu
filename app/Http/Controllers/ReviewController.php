<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'reviewRating' => 'required|integer|min:1|max:5',
            'reviewText' => 'required|string',
        ]);
    
        Review::create([
            'package_id' => $request->package_id, // Ensure this value is being sent correctly
            'user_id' => Auth::id(),
            'content' => $request->reviewText,
            'rating' => $request->reviewRating,
        ]);
    
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
    
}
