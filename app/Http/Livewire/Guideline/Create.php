<?php

namespace App\Http\Livewire\Guideline;

use App\Models\GuideLineModel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;
    public $page_title = "Create Guidelines";

    public $title, $banner_image, $desc;

    protected $rules = [
        'title' => ['required'],
        'desc' => ['required'],
        'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {
        $team_create = new GuideLineModel();
        $team_create->title  = $this->title;
        $team_create->slag  = Str::slug($this->title) ;
        $team_create->desc  = $this->desc;
        $team_create->banner_image  = $this->banner_image->store('files', 'public');
        $team_create->save();

        session()->flash('message', 'created successfully');
        $this->reset();
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.guideline.create')->layout('admin.app');
    }
}
