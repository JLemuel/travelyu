<?php

namespace App\View\Components\Homepage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopCards extends Component
{
    public $destinations;
    public $title;
    public $subtitle;
    public function __construct($destinations, $title, $subtitle)
    {
        $this->destinations = $destinations;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.homepage.top-cards');
    }
}
