<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PackageCard extends Component
{
    public $destination;

    /**
     * Create a new component instance.
     *
     * @param $destination
     */
    public function __construct($destination)
    {
        $this->destination = $destination;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.package-card');
    }
}
