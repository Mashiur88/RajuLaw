<?php

namespace App\Http\Livewire\CoreValue;

use App\Models\CoreValueModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $all_data,
        $title,
        $desc,
        $icon,
        $edit_id,
        $edit_icon,
        $edit_mode = false,
        $create_mode = false,
        $page_title = 'Core Values',
        $edit_data;

    protected $rules = [
        'edit_data.*' => 'string',
        'edit_data.icon' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'edit_data.title' => 'string',
        'edit_data.desc' => 'string',
        'title' => 'required',
        'desc' => 'required',
        'icon' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ];

    public function mount()
    {
        $this->all_data = CoreValueModel::all();
        $this->edit_mode = false;
        $this->create_mode = false;
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function edit_parent($id)
    {
        $this->edit_data = CoreValueModel::find($id);
        $this->edit_mode = true;
    }

    public function update()
    {
        $service_parent = CoreValueModel::find($this->edit_data->id);
        $service_parent->title = $this->edit_data['title'];
        $service_parent->desc = $this->edit_data['desc'];
        $service_parent->icon = $this->edit_icon ? $this->edit_icon->store('files', 'public') : $service_parent->icon;
        $service_parent->update();

        session()->flash('message', 'Updated successfully');
        $this->edit_mode = false;
        $this->mount();
    }

    public function create()
    {
        $this->create_mode = true;
    }

    public function delete($id)
    {
        CoreValueModel::find($id)->delete();
        session()->flash('message', 'Deleteed successfully');
        $this->mount();
    }

    public function store()
    {
        $this->validate();

        $service = new CoreValueModel();
        $service->title = $this->title;
        $service->desc = $this->desc;
        $service->icon = $this->icon->store('files', 'public');
        $service->save();

        $this->create_mode = false;
        session()->flash('message', 'Created successfully');
        $this->mount();
    }

    public function back()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.core-value.index')->layout('admin.app');
    }
}
