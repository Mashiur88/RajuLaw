<?php

namespace App\Http\Livewire\MeetRaju;

use App\Models\MeedRajuModel;
use Livewire\Component;

class Index extends Component
{
    public $fetch_data, $image, $title, $video_url, $short_name, $edit_id;
    public $page_title = "Raju Meet Section";
    public $update_mode = false;

    protected $rules = [
        'title' => ['required'],
        'video_url' => ['required'],
        'short_name' => ['required'],
    ];


    public function mount()
    {
        $this->fetch_data = MeedRajuModel::all();
        $this->title = null;
        $this->video_url = null;
        $this->short_name = null;
        $this->edit_id = null;
    }

    public function edit($edit_id)
    {
        $this->edit_id = $edit_id;
        $item = MeedRajuModel::find($edit_id);
        $this->video_url = $item->video_url;
        $this->title = $item->title;
        $this->short_name = $item->short_name;

        $this->update_mode = true;
    }

    public function update()
    {
        $this->validate();
        $item = MeedRajuModel::find($this->edit_id);
        $item->short_name = $this->short_name;
        $item->video_url = $this->video_url;
        $item->title = $this->title;
        $item->update();

        $this->mount();
        $this->update_mode = false;
        session()->flash('message', 'Updated successfully');
    }

    public function render()
    {
        return view('livewire.meet-raju.index')->layout('admin.app');
    }
}
