<?php

namespace App\Http\Livewire\Testimonial;

use App\Models\TestimonialModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $testimonials, $image, $rating, $desc, $name, $edit_id;
    public $page_title = "All Testimonial";
    public $add_input = false;
    public $update_mode = false;

    protected $rules = [
        'rating' => ['required', 'numeric', 'between:1,5'],
        'desc' => ['required'],
        'name' => ['required'],
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];


    public function mount()
    {
        $this->testimonials = TestimonialModel::all();
        $this->image = null;
        $this->rating = null;
        $this->desc = null;
        $this->name = null;
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
        $created_item = new TestimonialModel();
        $created_item->name = $this->name;
        $created_item->desc = $this->desc;
        $created_item->image = isset($this->image) ? $this->image->store('files', 'public') : null;
        $created_item->rating = $this->rating;
        $created_item->save();

        session()->flash('message', 'created successfully');
        $this->mount();
        $this->add_input = false;
    }


    public function edit($edit_id)
    {
        $this->edit_id = $edit_id;
        $item = TestimonialModel::find($edit_id);
        $this->image = $item->image;
        $this->desc = $item->desc;
        $this->rating = $item->rating;
        $this->name = $item->name;

        $this->update_mode = true;
        $this->add_input = true;
    }

    public function update()
    {
        $this->validate([
            'rating' => ['required', 'numeric', 'between:1,5'],
            'desc' => ['required'],
            'name' => ['required'],
            // 'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $item = TestimonialModel::find($this->edit_id);
        $item->name = $this->name;
        $item->desc = $this->desc;
        $item->image = $this->image !== $item->image ? $this->image->store('files', 'public') : $item->image;
        $item->rating = $this->rating;
        $item->update();

        $this->mount();
        $this->add_input = false;
        $this->update_mode = false;
        session()->flash('message', 'Updated successfully');
    }

    public function delete($edit_id)
    {
        $this->edit_id = $edit_id;
        TestimonialModel::find($this->edit_id)->delete();
        session()->flash('message', 'Item Deleted');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.testimonial.index')->layout('admin.app');
    }
}
