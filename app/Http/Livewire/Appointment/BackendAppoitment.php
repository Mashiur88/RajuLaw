<?php

namespace App\Http\Livewire\Appointment;

use App\Models\AppointmentModel;
use Livewire\Component;

class BackendAppoitment extends Component
{
    public $text, $subject, $edit_id;
    public $page_title = 'Appointment Page Setting';
    public $update_mode = false;

    protected $rules = [
        'text' => ['required'],
    ];

    public function mount()
    {
        $this->update_mode = false;
    }

    public function edit($edit_id)
    {
        $this->edit_id = $edit_id;
        $item = AppointmentModel::find($edit_id);
        $this->text = $item->text;
        $this->subject = $item->subject;

        $this->update_mode = true;
    }

    public function update()
    {
        $this->validate();
        $item = AppointmentModel::find($this->edit_id);

        $item = AppointmentModel::find($this->edit_id);
        $item->text = $this->text;
        $item->update();

        $this->mount();
        $this->update_mode = false;
        session()->flash('message', 'Updated successfully');
    }

    public function back()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.appointment.backend-appoitment', [
            'fetch_data' => AppointmentModel::orderBy('created_at')
                ->get()
                ->groupBy(function ($data) {
                    return $data->group_name;
                }),
        ])->layout('admin.app');
    }
}
