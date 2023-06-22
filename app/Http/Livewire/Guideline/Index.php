<?php

namespace App\Http\Livewire\Guideline;

use App\Models\GuideLineModel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['data_deleted' => '$refresh', 'delete'];

    public $page_title = "Guidelines";
    public $perPage = 10;
    public $orderBy = 'id';
    public $orderByAsc = true;
    public $search;
    public $data;

    public function deleteconfirm($member_id)
    {
        $this->data = GuideLineModel::find($member_id);
        $this->emit('swal');
    }

    public function delete()
    {
        if ($this->data) {
            $this->data->delete();
            $this->emitSelf('data_deleted');
        }
    }


    public function render()
    {
        return view('livewire.guideline.index',[
            'all_data' => GuideLineModel::search($this->search)
                ->orderBy($this->orderBy, $this->orderByAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ])->layout('admin.app');
    }
}
