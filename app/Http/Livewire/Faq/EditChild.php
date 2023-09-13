<?php

namespace App\Http\Livewire\Faq;

use App\Models\FaqChildModel;
use App\Models\FaqModel;
use Livewire\Component;

class EditChild extends Component
{
    public $page_title = 'Create Faq Content',
        $contents,
        $parent_id,
        $edit_data,
        $edit_id,
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

    public function parent_update()
    {
        $service_parent = FaqChildModel::find($this->edit_id);
        $service_parent->title = $this->edit_parent_date['title'];
        $service_parent->desc = $this->edit_parent_date['desc'];
        $service_parent->plain_desc = preg_replace('/\s+|&nbsp;/', ' ', strip_tags($this->edit_parent_date['desc']));
        $service_parent->update();

        session()->flash('message', 'Updated successfully');
        
        $this->back();
    }

    public function back()
    {
        return redirect()->route('admin.faq_content', ['parent_id' => $this->parent_id]);
    }

    public function mount($parent_id, $child_id)
    {
        $this->edit_parent_date = FaqChildModel::find($child_id);
        $this->edit_id = $child_id;
        $this->parent_id = $parent_id;
    }

    public function render()
    {
        return view('livewire.faq.edit-child')->layout('admin.app');
    }
}
