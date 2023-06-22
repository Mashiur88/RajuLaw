<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Appointment extends Component
{
    public $active = true;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function change_mode()
    {
        if ($this->active) {
            $this->active = false;
            $this->emitSelf('refreshComponent');
        } else {
            $this->active = true;
            $this->emitSelf('refreshComponent');
        }
    }


    public function render()
    {
        return view('livewire.frontend.appointment')->layout('frontend.app');
    }
}
