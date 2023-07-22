<?php

namespace App\Http\Livewire\Faq;

use App\Models\FaqChildModel;
use App\Models\FaqModel;
use Livewire\Component;

class FaqContent extends Component
{
    public $page_title = 'Faq Content',
        $contents,
        $edit_mode = false,
        $delete_mode = false,
        $parent_id,
        $edit_data,
        $edit_id,
        $create_mode = false,
        $title,
        $desc,$edit_parent_date;

    protected $rules = [
        'edit_parent_date.*' => 'string',
        'edit_parent_date.title' => 'required',
        'edit_parent_date.desc' => 'required',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function edit_parent($parent_id)
    {
        $this->edit_parent_date = FaqChildModel::find($parent_id);
        $this->edit_mode = true;
        $this->edit_id = $parent_id;
    }

    public function parent_update()
    {
        $service_parent = FaqChildModel::find($this->edit_id);
        $service_parent->title = $this->edit_parent_date['title'];
        $service_parent->plain_desc = preg_replace('/\s+|&nbsp;/', ' ', strip_tags($this->edit_parent_date['desc']));
        $service_parent->desc = $this->edit_parent_date['desc'];
        $service_parent->update();

        session()->flash('message', 'Updated successfully');
        $this->edit_mode = false;
        $this->mount($this->parent_id);
    }

    public function create()
    {
        $this->create_mode = true;
        $this->title = '';
        $this->desc = '';
    }

    public function delete($id)
    {
        FaqChildModel::find($id)->delete();
        session()->flash('message', 'Deleteed successfully');
        $this->mount($this->parent_id);
    }

    public function store()
    {
        $service = new FaqChildModel();
        $service->title = $this->title;
        $service->desc = $this->desc;
        $service->plain_desc = preg_replace('/\s+|&nbsp;/', ' ', strip_tags($this->desc));
        $service->faq_id = $this->parent_id;
        $service->save();

        $this->create_mode = false;
        session()->flash('message', 'Created successfully');
        $this->mount($this->parent_id);
    }

    public function back()
    {
        $this->mount($this->parent_id);
    }
    public function mount($parent_id)
    {
        $this->contents = FaqChildModel::where('faq_id', $parent_id)->get();
        $this->parent_id = $parent_id;
        $this->edit_mode = false;
        $this->create_mode = false;

        $this->page_title = FaqModel::find($parent_id)->name . '- Content';
    }

    public function render()
    {
        return view('livewire.faq.faq-content')->layout('admin.app');
    }
}
