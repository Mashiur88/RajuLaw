<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\Team;

class NewAppointment extends Component
{
    public $active = true;
    public $datas = array();
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function change_mode()
    {
        if ($this->active) {
            $this->active = false;
            $this->emitSelf('refreshComponent');
        } else {
            $this->active = true;
            $this->emitSelf('refreshComponent');
        }
    }

    public function mount(){
        $temps = [];
        $temps = Team::with('appointments')->where('appointment','1')->get();
        // dd($temps);
         
        // foreach($temps as $temp){
        //     if(!empty($temp)){
        //         // $appointments['id'][$temp['attorny_id']] = [];
        //         $appointments['id'][$temp['attorny_id']] = $temp['attorny_id'];
        //         if(isset($temp['attorny'])){  
        //             $appointments['id'][$temp['attorny_id']]['name'] = $temp['attorny']['name'];
        //         }
        //         $appointments['id'][$temp['attorny_id']]['group']['name'] = $temp['group_name'];
        //         $appointments['id'][$temp['attorny_id']]['group'][$temp['group_name']] = [];
        //         $appointments['id'][$temp['attorny_id']]['group'][$temp['group_name']]['duration1'] = $temp['duration1'];
        //         $appointments['id'][$temp['attorny_id']]['group'][$temp['group_name']]['duration2'] = $temp['duration2'];
        //         $appointments['id'][$temp['attorny_id']]['group'][$temp['group_name']]['duration3'] = $temp['duration3'];
        //         $appointments['id'][$temp['attorny_id']]['group'][$temp['group_name']]['charge1'] = $temp['charge1'];
        //         $appointments['id'][$temp['attorny_id']]['group'][$temp['group_name']]['charge2'] = $temp['charge2'];
        //         $appointments['id'][$temp['attorny_id']]['group'][$temp['group_name']]['charge3'] = $temp['charge3'];
        //         $appointments['id'][$temp['attorny_id']]['group'][$temp['group_name']]['note'] = $temp['note'];
        //     }
        // }
        
        foreach($temps as $temp){
            $data['name'] = $temp->name;
            $data['attorny_note'] = $temp->attorny_note;
            $data['group']['Free'] = $temp->appointments->where('group_name','Free')->first();
            $data['group']['Paid'] = $temp->appointments->where('group_name','Paid')->first();
            $this->datas[] = $data;
        }
        // dd($this->datas);

        // foreach($this->datas as $item){
        //     foreach($item['group'] as $key => $data){
        //         echo $key;
        //         echo $data['id'];
        //     }
        //     exit;
        // }
    }

    public function render(){
        return view('livewire.frontend.new-appointment')->layout('frontend.app');
    }
}
