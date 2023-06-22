<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textEditor extends Component
{
    public $labelname, $for;

    public function __construct($labelname, $for)
    {
        $this->labelname = $labelname;
        $this->for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.text-editor');
    }
}
