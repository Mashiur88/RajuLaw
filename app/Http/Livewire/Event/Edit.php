<?php

namespace App\Http\Livewire\Event;

use App\Models\event;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = ['refresh_data'=>'$refresh'];
    public $page_title = "Update Event";
    public $event_id;
    public $event_name , $event_date;
    public $venue, $event_organizer;
    public $location;
    public $event_description;
    public $banner_image, $upload_image;

    // protected $rules = [
    //     'name' => ['required'],
    //     'designation' => ['required'],
    //     'about' => ['required'],
    //     'email' => ['required'],
    //     'phone_number' => ['required'],
    //     'branch' => ['required'],
    //     'address' => ['required'],
    //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    // ];

    // public function updated($property){
    //     $this->validateOnly($property);
    // }

    public function mount($id){
        $this->event_id = $id;
        $event = Event::find($this->event_id);
        // dd($event);
        $this->event_name = $event->event_name;
        $this->event_date = $event->event_date;
        $this->venue = $event->venue;
        $this->event_organizer = $event->event_organizer;
        $this->location = $event->location;
        $this->event_description = $event->event_description;
        $this->banner_image = $event->banner_images;
    }

    public function update(){
        $event = Event::find($this->event_id);
        $event->event_name = $this->event_name;
        $event->event_date = $this->event_date;
        $event->venue = $this->venue;
        $event->event_organizer = $this->event_organizer;
        $event->location = $this->location;
        $event->event_description = $this->event_description;
        $event->banner_images  = $this->upload_image !== $event->banner_images ? $this->upload_image->store('files/event', 'public') : $event->banner_images;
        $event->update();
        session()->flash('message', 'Event Updated successfully');
        $this->emitSelf('refresh_data');
        return redirect(request()->header('Referer'));
    }
    
    public function render(){
        return view('livewire.event.edit')->layout('admin.app');
    }
}
