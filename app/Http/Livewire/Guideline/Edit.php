<?php

namespace App\Http\Livewire\Guideline;

use App\Models\GuideLineModel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = ['refresh_data' => '$refresh'];
    public $page_title = "Edit Guideline";

    public $title, $banner_image, $desc, $edit_id;

    protected $rules = [
        'title' => ['required'],
        'desc' => ['required'],
        'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount($edit_id)
    {
        $this->edit_id = $edit_id;
        $member = GuideLineModel::find($edit_id);
        $this->title = $member->title;
        $this->desc = $member->desc;
        $this->banner_image = $member->banner_image;
    }

    public function update()
    {
        $member_update = GuideLineModel::find($this->edit_id);
        $member_update->title  = $this->title;
        $member_update->slag  = Str::slug($this->title);
        $member_update->desc  = $this->desc;
        $member_update->plain_desc = preg_replace('/\s+|&nbsp;/', ' ', strip_tags($this->desc));
        $member_update->banner_image  = $this->banner_image !== $member_update->banner_image ? $this->banner_image->store('files', 'public') : $member_update->banner_image;
        $member_update->update();

        session()->flash('message', 'Updated successfully');
        $this->emitSelf('refresh_data');
        $this->banner_image = $member_update->banner_image;
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.guideline.edit')->layout('admin.app');
    }
}
