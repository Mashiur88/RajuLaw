<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['data_deleted' => '$refresh', 'delete'];

    public $page_title = "All Admin User";
    public $perPage = 10;
    public $orderBy = 'id';
    public $orderByAsc = true;
    public $search;
    public $data;

    public function deleteconfirm($id)
    {
        $this->data = User::find($id);
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
        return view('livewire.users.index', [
            'all_data' => User::search($this->search)
                ->orderBy($this->orderBy, $this->orderByAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ])->layout('admin.app');
    }
}
