<?php

namespace App\Http\Livewire\Contactinfo;

use App\Models\contactinfo;
use Livewire\Component;

class Index extends Component
{
    public $page_title = 'Contact Info';

    public $contact_info;

    protected $rules = [
        'contact_info.*.name' => 'string',
        'contact_info.*.address' => 'string',
        'contact_info.*.phone' => 'string',
        'contact_info.*.map' => 'string',
    ];

    public function mount()
    {
        $this->contact_info = contactinfo::all();
    }

    public function update()
    {
        foreach ($this->contact_info as $key=>$value) {
            $contact_info = contactinfo::find($value['id']);
            $contact_info->name = $value['name'];
            $contact_info->phone = $value['phone'];
            $contact_info->address = $value['address'];
            $contact_info->map = $value['map'];
            $contact_info->update();
        }

        session()->flash('message', 'Updated successfully');
    }


    public function render()
    {
        return view('livewire.contactinfo.index')->layout('admin.app');
    }
}
