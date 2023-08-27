<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Event;

class Events extends Component{

    public $events;
    public function mount(){
        $this->events = Event::all();
        // dd(sizeof($this->events));
        // dd($this->events);
        // $this->dispatchBrowserEvent('open_model',[]);
    }

    public function render(){
        return view('livewire.frontend.events')->layout('frontend.app');
    }
}