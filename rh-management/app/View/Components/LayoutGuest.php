<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class LayoutGuest extends Component
{
    /**
     * Create a new component instance.
     */

    public $pageTitle;

    public function __construct($pageTitle = null)
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout-guest');
    }
}
