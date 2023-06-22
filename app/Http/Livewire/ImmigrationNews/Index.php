<?php

namespace App\Http\Livewire\ImmigrationNews;

use App\Models\ImmigrationNewsModel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['data_deleted' => '$refresh', 'delete'];

    public $page_title = "Immigration News and Updates";
    public $perPage = 10;
    public $orderBy = 'id';
    public $orderByAsc = true;
    public $search;
    public $data;

    public function deleteconfirm($member_id)
    {
        $this->data = ImmigrationNewsModel::find($member_id);
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
        return view('livewire.immigration-news.index', [
            'all_data' => ImmigrationNewsModel::search($this->search)
                ->orderBy($this->orderBy, $this->orderByAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ])->layout('admin.app');
    }
}
