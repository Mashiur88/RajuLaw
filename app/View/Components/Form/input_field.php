<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input_field extends Component
{
    public $labelname,$for;

    public function __construct($labelname,$for)
    {
        $this->labelname = $labelname;
        $this->for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input_field');
    }
}
