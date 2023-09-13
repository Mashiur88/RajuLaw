<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['data_deleted' => '$refresh', 'delete'];

    public $page_title = 'All Member';
    public $perPage = 500;
    public $orderBy = 'id';
    public $orderByAsc = true;
    public $search;
    public $data,$tasks;

    public function deleteconfirm($member_id)
    {
        // Team::find($member_id)->delete();

        $this->data = Team::find($member_id);
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

    public function updateTaskOrder($list)
    {
        foreach ($list as $item) {
            Team::find($item['value'])->update(['order' => $item['order']]);
        }

        $this->tasks = Team::orderBy('order')->get();
    }

    public function render(){
        return view('livewire.team.index', [
            'members' => Team::search($this->search)
                ->orderBy('order')->get()
        ])->layout('admin.app');
    }
}
 