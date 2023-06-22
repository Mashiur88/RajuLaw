<?php

namespace App\Http\Livewire\Tech;

use App\Models\Techmodel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $testimonials, $image, $url, $edit_id;
    public $page_title = 'All Tech';
    public $add_input = false;
    public $update_mode = false;

    protected $rules = [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function mount()
    {
        $this->testimonials = Techmodel::all();
        $this->image = null;
        $this->url = null;
        $this->edit_id = null;
    }

    public function add()
    {
        $this->mount();
        $this->add_input = true;
        $this->update_mode = false;
    }

    public function store()
    {
        $this->validate();
        $created_item = new Techmodel();
        $created_item->url = $this->url;
        $created_item->image = isset($this->image) ? $this->image->store('files', 'public') : null;
        $created_item->save();

        session()->flash('message', 'created successfully');
        $this->mount();
        $this->add_input = false;
    }

    public function edit($edit_id)
    {
        $this->edit_id = $edit_id;
        $item = Techmodel::find($edit_id);
        $this->image = $item->image;
        $this->url = $item->url;

        $this->update_mode = true;
        $this->add_input = true;
    }

    public function update()
    {
        $item = Techmodel::find($this->edit_id);
        $item->url = $this->url;
        $item->image = $this->image !== $item->image ? $this->image->store('files', 'public') : $item->image;
        $item->update();

        $this->mount();
        $this->add_input = false;
        $this->update_mode = false;
        session()->flash('message', 'Updated successfully');
    }

    public function delete($edit_id)
    {
        $this->edit_id = $edit_id;
        Techmodel::find($this->edit_id)->delete();
        session()->flash('message', 'Item Deleted');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.tech.index')->layout('admin.app');
    }
}
