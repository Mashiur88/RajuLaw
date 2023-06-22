<?php

namespace App\Http\Livewire\Aboutus;

use App\Models\SettingModel;
use Livewire\Component;

class Index extends Component
{

    public $page_title = "About Us";
    public $about_us;

    public function mount()
    {
        $this->about_us = SettingModel::find(31)->value;
    }

    public function update()
    {
        $setting = SettingModel::find(31);
        $setting->value = $this->about_us;
        $setting->update();

        session()->flash('message', 'Updated successfully');
        return redirect(request()->header('Referer'));
    }

    public function render()
    {    
        return view('livewire.aboutus.index')->layout('admin.app');
    }
}
                    