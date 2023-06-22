<?php

namespace App\Http\Livewire\Service;

use App\Models\ServiceChieldModel;
use App\Models\ServiceModel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ServiceCreate extends Component
{
    use WithFileUploads;
    public $page_title = "Update Services Details";

    public $name, $desc, $image, $icon, $color, $service_id;
    public $service_details,$option_data;


    protected $rules = [
        'name' => ['required'],
        'desc' => ['required'],
        'color' => ['required'],
        'service_id' => ['required'],
        'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount($props_service_id)
    {
        $this->option_data = ServiceModel::all()->mapWithKeys(function($user, $key) {
            return [$user->id => $user->name];
        });
        $this->service_details = ServiceChieldModel::find($props_service_id);
        $this->name  = $this->service_details->name;
        $this->desc  = $this->service_details->desc;
        $this->color  = $this->service_details->color;
        $this->service_id  = $this->service_details->service_id;
        $this->image  = $this->service_details->image;
        $this->icon  = $this->service_details->icon;
    }

    public function store()
    {
        $this->service_details->name  = $this->name;
        $this->service_details->slag  = Str::slug($this->name) ;
        $this->service_details->desc  = $this->desc;
        $this->service_details->color  = $this->color;
        $this->service_details->service_id  = $this->service_id;
        $this->service_details->icon  =  $this->icon !== $this->service_details->icon ? $this->icon->store('files', 'public') : $this->service_details->icon;
        $this->service_details->update();

        session()->flash('message', 'Updated successfully');
        $this->mount($this->service_details->id);
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.service.service-create')->layout('admin.app');
    }
}
