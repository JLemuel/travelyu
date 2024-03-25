<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class UserBookings extends Component
{
    public $bookings;

    public function __construct()
    {
        if (Auth::check()) {
            $this->bookings = Auth::user()->bookings()->with('package')->get();
            // Assumes a 'bookings' relation defined in your User model and that each booking is related to a 'package'
        }
    }

    public function render()
    {
        return view('components.user-bookings');
    }
}
