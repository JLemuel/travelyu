<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TourPackages extends Component
{
    public $title;
    public $subtitle;
    public $packages;

    public function __construct($title, $subtitle, $packages)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->packages = $packages;
    }

    public function render()
    {
        return view('components.tour-packages');
    }
}
