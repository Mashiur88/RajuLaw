<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;
 
class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = ['refresh_data'=>'$refresh'];
    public $page_title = "Update Team Member";


    public $member_id;
    public $name,$fb,$in,$twt,$about;
    public $image;
    public $image_name;
    public $designation;


    protected $rules = [
        'name' => ['required'],
        'designation' => ['required'],
        'about' => ['required'],
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount($member_id)
    {
        $this->member_id = $member_id;
        $member = Team::find($member_id);
        // dd($member);
        $this->name = $member->name;
        $this->designation = $member->designation;
        $this->about = $member->about;
        $this->fb = $member->fb;
        $this->twt = $member->twt;
        $this->in = $member->in;
        $this->image = $member->image;
    }

    public function update()
    {
        $member_update = Team::find($this->member_id);
        $member_update->name  = $this->name;
        $member_update->designation  = $this->designation;
        $member_update->about  = $this->about;
        $member_update->fb  = $this->fb;
        $member_update->twt  = $this->twt;
        $member_update->in  = $this->in;
        $member_update->image  = $this->image !== $member_update->image ? $this->image->store('files', 'public') : $member_update->image;
        $member_update->update();

        session()->flash('message', 'Member Updated successfully');
        $this->emitSelf('refresh_data');
        $this->image = $member_update->image;
        return redirect(request()->header('Referer'));
    }
    
    public function render()
    {
        return view('livewire.team.edit')->layout('admin.app');
    }
}
