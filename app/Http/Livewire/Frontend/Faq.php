<?php

namespace App\Http\Livewire\Frontend;

use App\Models\FaqChildModel;
use App\Models\FaqModel;
use Livewire\Component;
use Livewire\WithPagination;

class Faq extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $faqs, $selected_faq, $selected_id, $have_child, $contents, $child_item, $active_child_item;

    public function mount()
    {
        $this->selected_faq = FaqModel::where('parent_id', 0)->first();
        $this->faqs = FaqModel::where('parent_id', 0)->get();
        $this->click_data($this->selected_faq->id);
    }

    public function click_data($id)
    {
        $this->selected_faq = FaqModel::find($id);

        if ($this->selected_faq->child->count() > 0)  {
            $this->have_child = true;
            $this->child_item = $this->selected_faq->child;
            $this->active_child_item = $this->selected_faq->child->first();
            $this->contents = $this->active_child_item->content;
        } else {
            $this->have_child = false;
            $this->contents = $this->selected_faq->content;
        }
    }

    public function child_item_content($id)
    {
        $this->active_child_item = FaqModel::find($id);
        $this->contents = FaqChildModel::where('faq_id', $id)->get();
    }

    public function get_content($id)
    {
        $this->contents = FaqChildModel::where('faq_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.frontend.faq', ['all_data' => FaqChildModel::paginate(10)])->layout('frontend.app');
    }
}
