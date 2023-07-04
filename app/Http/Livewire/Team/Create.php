<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;
 
class Create extends Component
{
    use WithFileUploads;
    public $page_title = "Create Team Member";

    public $name,$fb,$in,$twt,$about;
    public $image;
    public $image_name;
    public $designation;


    protected $rules = [
        'name' => ['required'],
        'designation' => ['required'],
        'about' => ['required'],
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {
        $team_create = new Team();
        $team_create->name  = $this->name;
        $team_create->designation  = $this->designation;
        $team_create->about  = $this->about;
        $team_create->fb  = $this->fb;
        $team_create->twt  = $this->twt;
        $team_create->in  = $this->in;
        $team_create->image  = $this->image->store('files', 'public');
        $team_create->save();
        dd($this);

        session()->flash('message', 'Team created successfully');
        $this->reset();
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.team.create')
            ->layout('admin.app');
    }
}
