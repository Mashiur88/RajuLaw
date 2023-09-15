<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Appointment;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;
 
class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = ['refresh_data'=>'$refresh'];
    public $page_title = "Update Appointment";

    public $attorny_id;
    public $appointment , $appointment_id;
    public $duration1, $duration2, $duration3;
    public $charge1, $charge2, $charge3;
    public $note;
    public $group_name;

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
        $this->appointment_id = $id;
        $appointment = Appointment::find($this->appointment_id);
        // dd($appointment);
        $this->attorny_id = $appointment->attorny_id;
        $this->attorny_note = $appointment->attorny_note;
        $this->duration1 = $appointment->duration1;
        $this->duration2 = $appointment->duration2;
        $this->duration3 = $appointment->duration3;
        $this->charge1 = $appointment->charge1;
        $this->charge2 = $appointment->charge2;
        $this->charge3 = $appointment->charge3;
        $this->note = $appointment->note;
        $this->group_name = $appointment->group_name;
    }

    public function update(){
        $appointment = Appointment::find($this->appointment_id);
        $appointment->attorny_id = $this->attorny_id;
        $appointment->attorny_note = $this->attorny_note;
        $appointment->duration1 = $this->duration1;
        $appointment->duration2 = $this->duration2;
        $appointment->duration3 = $this->duration3;
        $appointment->charge1 = $this->charge1;
        $appointment->charge2 = $this->charge2;
        $appointment->charge3 = $this->charge3;
        $appointment->note = $this->note;
        $appointment->group_name = $this->group_name;
        $appointment->update();

        session()->flash('message', 'Appointment Updated successfully');
        $this->emitSelf('refresh_data');
        return redirect(request()->header('Referer'));
    }
    
    public function render(){
        return view('livewire.appointment.edit')->layout('admin.app');
    }
}
