<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Event;
use App\Models\ImmigrationNewsModel;
use Livewire\Component;

class EventDetails extends Component
{
    public $page_title, $event, $news;
    public $event_name , $event_date;
    public $venue, $event_organizer;
    public $location;
    public $event_description;
    public $banner_image, $upload_image;

    public function mount($id){
        $event = Event::where('id',$id)->first();
        $this->event_name = $event->event_name;
        $this->event_date = $event->event_date;
        $this->venue = $event->venue;
        $this->event_organizer = $event->event_organizer;
        $this->location = $event->location;
        $this->event_description = $event->event_description;
        $this->banner_image = $event->banner_images;

        
        $this->news = ImmigrationNewsModel::limit(6)->get();
            // dd($this->news);
    }

    public function render(){
        return view('livewire.frontend.event-details')->layout('frontend.app');
    }
}
