<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Appointment;
use Livewire\Component;

class Appointments extends Component
{
    public $text, $subject, $edit_id;
    public $appointments;
    public $page_title = 'Attorny Appointment Details';

    protected $rules = [
        'text' => ['required'],
    ];

    public function mount(){
        $this->appointments = Appointment::all();

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

    public function back()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.appointment.appointments')->layout('admin.app');
    }
}
