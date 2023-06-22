<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectOption extends Component
{
    public $labelname, $for,$selecteddata;
    public $items;

    public function __construct($labelname, $for,$items,$selecteddata)
    {
        $this->labelname = $labelname;
        $this->for = $for;
        $this->items = $items;
        $this->selecteddata = $selecteddata;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select-option');
    }
}
