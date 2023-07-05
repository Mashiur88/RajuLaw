<?php

namespace App\Http\Livewire\Service;

use App\Models\ServiceModel;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $services, $name;
    public $active_service = 1;
    public $active_service_details,$box_icon,$box_color,$edit_icon,
        $edit_parent_date,
        $parent_edit_mode = false,
        $parent_create_mode = false;
    public $page_title = 'All services';

    protected $rules = [
        'edit_parent_date.*' => 'string',
        'edit_parent_date.box_icon' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'edit_parent_date.box_color' => 'string',
        'name' => 'required',
        'box_icon' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ];

    public function mount()
    {
        $this->services = ServiceModel::all();
        $this->parent_edit_mode = false;
        $this->parent_create_mode = false;
        $this->active_service_details = ServiceModel::find($this->active_service);
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function edit_parent($parent_id)
    {
        $this->edit_parent_date = ServiceModel::find($parent_id);
        $this->parent_edit_mode = true;
    }

    public function click_service($id)
    {
        $this->active_service = $id;
        $this->mount();
    }

    public function parent_update()
    {
        $service_parent = ServiceModel::find($this->edit_parent_date->id);
        $service_parent->name = $this->edit_parent_date['name'];
        $service_parent->slug =Str::slug( $this->edit_parent_date['name']);
        $service_parent->box_color = $this->edit_parent_date['box_color'];
        $service_parent->box_icon = $this->edit_icon ? $this->edit_icon->store('files', 'public'): $service_parent->box_icon;
        $service_parent->update();

        session()->flash('message', 'Updated successfully');
        $this->parent_edit_mode = false;
        $this->mount();
    }

    public function create()
    {
        $this->parent_create_mode = true;
    }

    public function delete($id)
    {
        ServiceModel::find($id)->delete();
        session()->flash('message', 'Deleteed successfully');
        $this->mount();
    }

    public function store()
    {
        $this->validate();

        $service = new ServiceModel();
        $service->name = $this->name;
        $service->slug = Str::slug($this->name);
        $service->box_color = $this->box_color;
        $service->box_icon = $this->box_icon->store('files', 'public');
        $service->save();

        $this->parent_create_mode = false;
        session()->flash('message', 'Created successfully');
        $this->mount();
    }

    public function back()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.service.index')->layout('admin.app');
    }
}
