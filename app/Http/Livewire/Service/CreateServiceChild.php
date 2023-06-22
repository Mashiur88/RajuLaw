<?php

namespace App\Http\Livewire\Service;

use App\Models\ServiceChieldModel;
use App\Models\ServiceModel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateServiceChild extends Component
{
    public $parent_seervice;
    use WithFileUploads;
    public $page_title = 'Create Service Child';

    public $name, $desc, $image, $icon, $color, $service_id;
    public $service_details, $option_data;

    protected $rules = [
        'name' => ['required'],
        'desc' => ['required'],
        'color' => ['required'],
        'service_id' => ['required'],
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount($props_service_id)
    {
        $this->parent_seervice = ServiceModel::find($props_service_id);
    }

    public function store()
    {
        $service_child = new ServiceChieldModel();
        $service_child->name = $this->name;
        $service_child->slag  = Str::slug($this->name) ;
        $service_child->desc = $this->desc;
        $service_child->color = $this->color;
        $service_child->service_id = $this->parent_seervice->id;
        // $service_child->image =  $this->image->store('files', 'public');
        $service_child->icon =  $this->icon->store('files', 'public');
        $service_child->save();

        session()->flash('message', 'Created successfully');
        return redirect()->route('admin.chield_data',$this->parent_seervice->id);
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.service.create-service-child')->layout('admin.app');
    }
}
