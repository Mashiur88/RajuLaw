<?php

namespace App\Http\Livewire\Frontend;

use App\Models\GuideLineModel;
use App\Models\ImmigrationNewsModel;
use Livewire\Component;
use Livewire\WithPagination;

class BlogList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $page_title;
    public $type;

    public function mount($type)
    {
        if ($type == 'immigration') {
            $this->page_title = 'Immigration News and Updates';
            $this->type = "immigration";
        } else {
            $this->page_title = 'Guidelines';
            $this->type = 'guideline';
        }
    }
    public function render()
    {
        return view('livewire.frontend.blog-list', ['list_data' => $this->type == "immigration"?ImmigrationNewsModel::paginate(9) : GuideLineModel::paginate(9)])->layout('frontend.app');
    }
}
