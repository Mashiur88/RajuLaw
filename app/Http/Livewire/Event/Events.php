<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Livewire\Component;

class Events extends Component
{
    // public $text, $subject, $edit_id;
    public $events;
    public $page_title = 'Event List Details';

    // protected $rules = [
    //     'text' => ['required'],
    // ];

    public function mount(){
        $this->events = Event::all();
        // dd($this->events);
    }

    public function deleteconfirm($id){
        $this->data = Event::find($id);
        $this->emit('swal', 'are u sure?', 'warning');
        // $this->dispatchBrowserEvent('deleted', [
        //     'title' => 'Data deleted'
        // ]);
    }

    public function delete(){
        if ($this->data) {
            $this->data->delete();
            $this->emitSelf('data_deleted');
        }
    }

    // public function update()
    // {
    //     $this->validate();
    //     $item = AppointmentModel::find($this->edit_id);
    //     $item->text = $this->text;
    //     $item->update();

    //     $this->mount();
    //     $this->update_mode = false;
    //     session()->flash('message', 'Updated successfully');
    // }

    public function back(){
        $this->mount();
    }

    public function render(){
        return view('livewire.event.events')->layout('admin.app');
    }
}
