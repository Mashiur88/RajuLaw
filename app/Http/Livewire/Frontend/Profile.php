<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Team as ModelsTeam;

class Profile extends Component{

    public function mount($id){
        $team_member_data = ModelsTeam::find($id);
        $this->name = $team_member_data['name'];
        $this->designation = $team_member_data['designation'];
        $this->fb = $team_member_data['fb'];
        $this->twt= $team_member_data['twt'];
        $this->in= $team_member_data['in'];
        $this->image= $team_member_data['image'];
        $this->about= $team_member_data['about'];
        // dd($team_member_data);
        // $this->dispatchBrowserEvent('open_model',[]);
    }


    public function render(){
        return  view('livewire.frontend.profile')->layout('frontend.app');
    }
}