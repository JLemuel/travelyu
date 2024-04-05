<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class TouristContact extends Component
{
    public $tourist;

    public function __construct()
    {
        // Fetch the first user with the type 'tourist'
        $this->tourist = User::where('type', 'travel_agency')->first();
    }

    public function render()
    {
        return view('components.tourist-contact');
    }
}
