<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Team as ModelsTeam;
use Livewire\Component;

class Team extends Component
{
    public $current_team_id,$team_member_data=[],$model_show = false;
    public $name,$designation,$fb,$twt,$in,$image,$about;
    protected $listeners = ['refreshComponent' => '$refresh'];
    
    // public function team_details($id)
    // {
    //     $team_member_data = ModelsTeam::find($id);
    //     $this->name = $team_member_data['name'];
    //     $this->designation = $team_member_data['designation'];
    //     $this->fb = $team_member_data['fb'];
    //     $this->twt= $team_member_data['twt'];
    //     $this->in= $team_member_data['in'];
    //     $this->image= $team_member_data['image'];
    //     $this->about= $team_member_data['about'];
    //     $this->dispatchBrowserEvent('open_model',[]);
    // }

    public function render() {
        return view('livewire.frontend.team',[
            'team'=>ModelsTeam::orderBy('order')->get()
        ])->layout('frontend.app');
    }
}
