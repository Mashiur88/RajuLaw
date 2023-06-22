<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class button extends Component
{
    public $disabled,$title;

    /**
     * Create a new component instance.
     */

    public function __construct($disabled,$title)
    {
        $this->disabled = $disabled;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */

    public function render(): View|Closure|string
    {
        return view('components.form.button');
    }
}
