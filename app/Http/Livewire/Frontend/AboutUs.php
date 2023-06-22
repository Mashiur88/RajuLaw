<?php

namespace App\Http\Livewire\Frontend;

use App\Models\CoreValueModel;
use App\Models\SettingModel;
use Livewire\Component;

class AboutUs extends Component
{
    public function render()
    {
        return view('livewire.frontend.about-us',[
            'about_us'=>SettingModel::find(31)->value,
            'core_valus' => CoreValueModel::all()
        ])->layout('frontend.app');
    }
}
