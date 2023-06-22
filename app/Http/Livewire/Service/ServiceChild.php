<?php

namespace App\Http\Livewire\Service;

use App\Models\ServiceChieldModel;
use App\Models\ServiceModel;
use Livewire\Component;

class ServiceChild extends Component
{
    public $service,$child_data;


    public function mount($parent_id)
    {
        $this->service = ServiceModel::find($parent_id);
        $this->child_data = $this->service->chirld_services;
    }

    public function delete($id)
    {
        ServiceChieldModel::find($id)->delete();
        session()->flash('message', 'Deleteed successfully');
        $this->mount($this->service->id);
    }

    public function render()
    {
        return view('livewire.service.service-child')->layout('admin.app');
    }
}
