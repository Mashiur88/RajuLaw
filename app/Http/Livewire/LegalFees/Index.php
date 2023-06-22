<?php

namespace App\Http\Livewire\LegalFees;

use App\Models\LegalFeesModel;
use Livewire\Component;

class Index extends Component
{
    public $page_title = 'Legal Fees';
    protected $listeners = ['data_deleted' => '$refresh', 'delete'];

    public $members;

    public function mount()
    {
        $this->members = LegalFeesModel::all();
    }

    public function deleteconfirm($member_id)
    {
        // Team::find($member_id)->delete();

        $this->data = LegalFeesModel::find($member_id);
        $this->emit('swal', 'are u sure?', 'warning');
        // $this->dispatchBrowserEvent('deleted', [
        //     'title' => 'Data deleted'
        // ]);
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
        return view('livewire.legal-fees.index')->layout('admin.app');
    }
}
