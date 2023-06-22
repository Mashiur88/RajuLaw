<?php

namespace App\Http\Livewire\Frontend;

use App\Models\ServiceChieldModel;
use Livewire\Component;

class SingleService extends Component
{
    public  $data;

    public function mount($slag)
    {
        $this->data = ServiceChieldModel::where('slag',$slag)->first();
    }

    public function render()
    {
        return view('livewire.frontend.single-service')->layout('frontend.app');
    }
}
