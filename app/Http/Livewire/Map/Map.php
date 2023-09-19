<?php

namespace App\Http\Livewire\Map;

use App\Models\MapModel;
use Livewire\Component;

class Map extends Component
{
    public $page_title = 'Map';
    public $countryCodes;
    public $country;
    public $selected = [];

    public function updateSelectedCountry(): void
    {
        $remove=$this->countryCodes->where('value','>',0)->whereNotIn('key',$this->selected)->toArray();
        foreach ($remove as $item){
            $this->countryCodes->where('key',$item['key'])->first()->update(['value'=>0]);
        }
        foreach ($this->selected as $item){
            $this->countryCodes->where('key',$item)->first()->update(['value'=>1]);
        }
    }

    public function mount()
    {
        $this->countryCodes = MapModel::query()->get();
        $this->selected= $this->countryCodes->where('value','>',0)->pluck('key')->toArray();
    }

    public function render()
    {
        return view('livewire.map.map')->layout('admin.app');
    }
}
