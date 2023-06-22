<?php

namespace App\Http\Livewire\Faq;

use App\Models\FaqChildModel;
use App\Models\FaqModel;
use Livewire\Component;

class Index extends Component
{
    public $services, $name;
    public $active_service = 1;
    public $active_service_details,
        $parent_id,
        $edit_parent_date,
        $parent_edit_mode = false,
        $parent_create_mode = false,$all_parent,$edit_item_parent;
    public $page_title = 'All Faq';

    protected $rules = [
        'edit_parent_date.*' => 'string',
        'edit_parent_date.name' => 'required',
        'edit_parent_date.parent_id' => 'required',
    ];

    public function mount()
    {
        $this->services = FaqModel::all();
        $this->parent_edit_mode = false;
        $this->parent_create_mode = false;
        $this->all_parent = FaqModel::where('parent_id',0)->get();
        $this->active_service_details = FaqModel::find($this->active_service);
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function edit_parent($parent_id)
    {
        $this->edit_parent_date = FaqModel::find($parent_id);
        $this->parent_edit_mode = true;
        $this->edit_item_parent = $this->edit_parent_date->parent_id;
    }

    public function click_service($id)
    {
        $this->active_service = $id;
        $this->mount();
    }

    public function parent_update()
    {
        $service_parent = FaqModel::find($this->edit_parent_date->id);
        $service_parent->name = $this->edit_parent_date['name'];
        $service_parent->parent_id = $this->edit_parent_date['parent_id'];
        $service_parent->update();

        session()->flash('message', 'Updated successfully');
        $this->parent_edit_mode = false;
        $this->mount();
    }

    public function create()
    {
        $this->parent_create_mode = true;
        $this->name = '';
    }

    public function delete($id)
    {
        FaqModel::find($id)->delete();
        session()->flash('message', 'Deleteed successfully');
        $this->mount();
    }

    public function store()
    {
        $service = new FaqModel();
        $service->name = $this->name;
        $service->parent_id = $this->parent_id == null ? 0 : $this->parent_id;
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
        return view('livewire.faq.index')->layout('admin.app');
    }
}
