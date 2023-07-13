<?php

namespace App\Http\Livewire\Faq;

use App\Models\FaqChildModel;
use App\Models\FaqModel;
use Livewire\Component;

class CreateChild extends Component
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

    public function store()
    {
        $service = new FaqChildModel();
        $service->title = $this->title;
        $service->desc = $this->desc;
        $service->faq_id = $this->parent_id;
        $service->save();

        session()->flash('message', 'Created successfully');
        
        $this->back();
    }

    public function back()
    {
        return redirect()->route('admin.faq_content', ['parent_id' => $this->parent_id]);
    }

    public function mount($parent_id)
    {
        $this->title = '';
        $this->desc = '';
    }

    public function render()
    {
        return view('livewire.faq.create-child')->layout('admin.app');
    }
}
