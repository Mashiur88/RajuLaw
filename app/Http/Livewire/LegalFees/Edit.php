<?php

namespace App\Http\Livewire\LegalFees;

use App\Models\LegalFeesChildModel;
use App\Models\LegalFeesModel;
use Livewire\Component;

class Edit extends Component
{
    public $page_title = 'Update Legal Fees';
    public $data,
        $title,
        $section_one_input = [],
        $section_one_i = 1,
        $section_two_input = [],
        $section_two_i = 1,
        $section_three_input = [],
        $section_three_i = 1,
        $section_one_name,
        $section_two_name,
        $section_three_name,
        $section_one_data,
        $section_two_data,
        $section_three_data,$active_id;

    protected $rules = [
        'section_one_data.*.lebel' => 'string',
        'section_one_data.*.tag' => 'string',
        'section_two_data.*.lebel' => 'string',
        'section_two_data.*.tag' => 'string',
        'section_three_data.*.lebel' => 'string',
        'section_three_data.*.tag' => 'string',
    ];

    public function add_new_update_seection($section)
    {
        if ($section == 'first') {
            $this->section_one_data->push(new LegalFeesChildModel());
        } elseif ($section == 'second') {
            $this->section_two_data->push(new LegalFeesChildModel());
        } elseif ($section == 'three') {
            $this->section_three_data->push(new LegalFeesChildModel());
        }
    }

    public function remove_update_seection($index, $section)
    {
        if ($section == 'first') {
            $this->section_one_data->forget($index);
        } elseif ($section == 'second') {
            $this->section_two_data->forget($index);
        } elseif ($section == 'three') {
            $this->section_three_data->forget($index);
        }
    }

    public function update()
    {
        LegalFeesChildModel::where('parent_id', $this->data->id)->delete();
        LegalFeesModel::find($this->data->id)->delete();

        $new_legal_fees = new LegalFeesModel();
        $new_legal_fees->name = $this->title;
        $new_legal_fees->id = $this->active_id;
        $new_legal_fees->first_part = $this->section_one_name;
        $new_legal_fees->second_part = $this->section_two_name;
        $new_legal_fees->notes = $this->section_three_name;
        $new_legal_fees->save();

        foreach ($this->section_one_data as $key => $value) {
            $new_section_one_child = new LegalFeesChildModel();
            $new_section_one_child->parent_id = $new_legal_fees->id;
            $new_section_one_child->section_name = 'section_one';
            $new_section_one_child->lebel = $this->section_one_data[$key]['lebel'];
            $new_section_one_child->tag = $this->section_one_data[$key]['tag'];
            $new_section_one_child->save();
        }

        foreach ($this->section_two_data as $key => $value) {
            $new_section_two_child = new LegalFeesChildModel();
            $new_section_two_child->parent_id = $new_legal_fees->id;
            $new_section_two_child->section_name = 'section_two';
            $new_section_two_child->lebel = $this->section_two_data[$key]['lebel'];
            $new_section_two_child->tag = $this->section_two_data[$key]['tag'];
            $new_section_two_child->save();
        }

        foreach ($this->section_three_data as $key => $value) {
            $new_section_three_child = new LegalFeesChildModel();
            $new_section_three_child->parent_id = $new_legal_fees->id;
            $new_section_three_child->section_name = 'section_three';
            $new_section_three_child->lebel = $this->section_three_data[$key]['lebel'];
            $new_section_three_child->tag = $this->section_three_data[$key]['tag'];
            $new_section_three_child->save();
        }

        session()->flash('message', 'Updated successfully');
        $this->mount($new_legal_fees->id);
    }

    public function mount($id)
    {
        $this->data = LegalFeesModel::find($id);
        $this->title = $this->data->name;
        $this->active_id = $id;
        $this->section_one_name = $this->data->first_part;
        $this->section_two_name = $this->data->second_part;
        $this->section_three_name = $this->data->notes;

        $this->section_one_data = $this->data->child_data
            ->where('section_name', 'section_one')
            ->where('parent_id', $id);
            
        $this->section_two_data = $this->data->child_data
            ->where('section_name', 'section_two')
            ->where('parent_id', $id);
        $this->section_three_data = $this->data->child_data
            ->where('section_name', 'section_three')
            ->where('parent_id', $id);
    }

    public function render()
    {
        return view('livewire.legal-fees.edit')->layout('admin.app');
    }
}
