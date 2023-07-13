<?php

namespace App\Http\Livewire\Faq;

use App\Models\FaqChildModel;
use App\Models\FaqModel;
use Livewire\Component;

class FaqContent extends Component
{
    public $page_title = 'Faq Content',
        $contents,
        $parent_id,
        $edit_data,
        $edit_id,
        $title,
        $desc,$edit_parent_date;

    public function delete($id)
    {
        FaqChildModel::find($id)->delete();
        session()->flash('message', 'Deleteed successfully');
        $this->mount($this->parent_id);
    }


    public function mount($parent_id)
    {
        $this->contents = FaqChildModel::where('faq_id', $parent_id)->get();
        $this->parent_id = $parent_id;
        $this->page_title = FaqModel::find($parent_id)->name . '- Content';
    }

    public function render()
    {
        return view('livewire.faq.faq-content')->layout('admin.app');
    }
}
