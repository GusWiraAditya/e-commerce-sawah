<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MainLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // Arahkan ke view yang berada di dalam folder 'components'
        return view('components.main-layout');
    }
}
