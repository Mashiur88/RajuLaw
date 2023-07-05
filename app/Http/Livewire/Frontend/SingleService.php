<?php

namespace App\Http\Livewire\Frontend;

use App\Models\ServiceChieldModel;
use App\Models\ServiceModel;
use Livewire\Component;

class SingleService extends Component
{
    public  $data;

    public function mount($parent_slag,$slag)
    {
        $service = ServiceModel::query()->where('slug',$parent_slag)->first();
        $childService = ServiceChieldModel::where('slag',$slag)->first();
        if ($service && $childService && $service->id == $childService->service_id){
            $this->data = $childService;
        }
        else{
            return $this->redirect(route('home'));
        }
    }

    public function render()
    {
        return view('livewire.frontend.single-service')->layout('frontend.app');
    }
}
