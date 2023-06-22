<?php

namespace App\Http\Livewire\Contactmessage;

use App\Models\ContactUsModel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['data_deleted' => '$refresh','delete'];

    public $page_title = "Contact Messages";
    public $perPage = 10;
    public $orderBy = 'id';
    public $orderByAsc = true;
    public $search;
    public $data;

    public function deleteconfirm($member_id)
    {
        $this->data = ContactUsModel::find($member_id);
        $this->emit('swal', 'are u sure?', 'warning');

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
        return view('livewire.contactmessage.index', [
            'message' => ContactUsModel::search($this->search)
                ->orderBy($this->orderBy, $this->orderByAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ])->layout('admin.app');
    }
}
