<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PackageGallery extends Component
{
    public $packages;
    public $title;
    public $subtitle;

    public function __construct($packages, $title, $subtitle)
    {
        $this->packages = $packages;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public function render()
    {
        return view('components.package-gallery');
    }
}
