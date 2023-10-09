<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Appointment;
use Livewire\Component;

class Appointments extends Component
{
    // public $text, $subject, $edit_id;
    public $appointments;
    public $page_title = 'Attorny Appointment Details';

    // protected $rules = [
    //     'text' => ['required'],
    // ];

    public function mount(){
        $this->appointments = Appointment::with('attorny')->orderBy('attorny_id')->get()->toArray();
        // dd($this->appointments);
    }

    public function deleteconfirm($id)
    {
        $this->data = Appointment::find($id);
        // dd($this->data);
        $this->emit('swal', 'are u sure?', 'warning');
    }

    public function delete()
    {
        if ($this->data) {
            $this->data->delete();
            $this->emitSelf('data_deleted');
        }
    }

    public function back()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.appointment.appointments')->layout('admin.app');
    }
}
