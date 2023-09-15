<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Appointment;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;
 
class Create extends Component
{
    use WithFileUploads;
    public $page_title = "Create Appointment";

    public $attorny_id, $attorny_note, $attornyList;
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
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    // ];

    // public function updated($property)
    // {
    //     $this->validateOnly($property);
    // }

    public function mount(){
        $this->attornyList = Team::where('designation','Supervising Attorney')->orWhere('designation','Founder & Principal Attorny')->get();
        // dd($this->attornyList);
    }

    public function store()
    {
        $appointment = new Appointment();
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
        $appointment->save();

        session()->flash('message', 'Appointment created successfully');
        $this->reset();
        return redirect(request()->header('Referer'));
    }

    public function render(){
        return view('livewire.appointment.create')
            ->layout('admin.app');
    }
}
