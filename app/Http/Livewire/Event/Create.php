<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;
 
class Create extends Component
{
    use WithFileUploads;
    public $page_title = "Create Event";
    public $event_id;
    public $event_name , $event_date;
    public $venue, $event_organizer;
    public $location;
    public $event_description;
    public $banner_images;

    // protected $rules = [
    //     'name' => ['required'],
    //     'designation' => ['required'],
    //     'about' => ['required'],
    //     'email' => ['required'],
    //     'phone_number' => ['required'],
    //     'branch' => ['required'],
    //     'address' => ['required'],
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    // ];

    // public function updated($property)
    // {
    //     $this->validateOnly($property);
    // }

    public function store()
    {
        // dd($this->event_date);
        $event = new Event();
        $event->event_name = $this->event_name;
        $event->location = $this->location;
        $event->venue = $this->venue;
        $event->event_organizer = $this->event_organizer;
        $event->event_date = $this->event_date;
        $event->event_description = $this->event_description;
        $event->banner_images = $this->banner_images->store('files/event', 'public');
        $event->save();

        session()->flash('message', 'Event created successfully');
        $this->reset();
        return redirect(request()->header('Referer'));
    }

    public function render(){
        return view('livewire.event.create')
            ->layout('admin.app');
    }
}
