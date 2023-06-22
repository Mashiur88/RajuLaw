<?php

namespace App\Http\Livewire\LegalFees;

use App\Models\LegalFeesChildModel;
use App\Models\LegalFeesModel;
use Livewire\Component;

class Create extends Component
{
    public $page_title = 'Create Legal Fees';
    public $data,$title,
        $section_one_input = [],
        $section_one_i = 1,
        $section_two_input = [],
        $section_two_i = 1,
        $section_three_input = [],
        $section_three_i = 1,
        $section_one_name,
        $section_two_name,
        $section_three_name,
        $lebel,
        $tag,
        $lebel2,
        $tag2,
        $lebel3,
        $tag3;

    public function section_one_add($i)
    {
        $i += 1;
        $this->section_one_i = $i;
        array_push($this->section_one_input, $i);
    }

    public function section_one_remove($i)
    {
        unset($this->section_one_input[$i]);
    }

    public function section_two_add($i)
    {
        $i += 1;
        $this->section_two_i = $i;
        array_push($this->section_two_input, $i);
    }

    public function section_two_remove($i)
    {
        unset($this->section_two_input[$i]);
    }

    public function section_three_add($i)
    {
        $i += 1;
        $this->section_three_i = $i;
        array_push($this->section_three_input, $i);
    }

    public function store()
    {
        $new_legal_fees = new LegalFeesModel();
        $new_legal_fees->name = $this->title;
        $new_legal_fees->first_part = $this->section_one_name;
        $new_legal_fees->second_part = $this->section_two_name;
        $new_legal_fees->notes = $this->section_three_name;
        $new_legal_fees->save();

        if (isset($this->lebel)) {
            foreach ($this->lebel as $key => $value) {
                $new_section_one_child = new LegalFeesChildModel();
                $new_section_one_child->parent_id = $new_legal_fees->id;
                $new_section_one_child->section_name = 'section_one';
                $new_section_one_child->lebel = $this->lebel[$key];
                $new_section_one_child->tag = $this->tag[$key];
                $new_section_one_child->save();
            }
        }

        if ($this->lebel2) {
            foreach ($this->lebel2 as $key => $value) {
                $new_section_two_child = new LegalFeesChildModel();
                $new_section_two_child->parent_id = $new_legal_fees->id;
                $new_section_two_child->section_name = 'section_two';
                $new_section_two_child->lebel = $this->lebel2[$key];
                $new_section_two_child->tag = $this->tag2[$key];
                $new_section_two_child->save();
            }
        }

        if ($this->lebel3) {
            foreach ($this->lebel3 as $key => $value) {
                $new_section_three_child = new LegalFeesChildModel();
                $new_section_three_child->parent_id = $new_legal_fees->id;
                $new_section_three_child->section_name = 'section_three';
                $new_section_three_child->lebel = $this->lebel3[$key];
                $new_section_three_child->tag = $this->tag3[$key];
                $new_section_three_child->save();
            }
        }

        session()->flash('message', 'created successfully');
        return redirect()->route('admin.ligal_fees');
    }


    public function render()
    {
        return view('livewire.legal-fees.create')->layout('admin.app');
    }
}
