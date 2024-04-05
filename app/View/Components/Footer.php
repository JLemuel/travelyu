<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User; // Make sure to import your User model

class Footer extends Component
{
    public $user;

    public function __construct()
    {
        $this->user = User::where('type', 'admin')->first();
    }

    public function render()
    {
        return view('components.footer');
    }
}
