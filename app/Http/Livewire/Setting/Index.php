<?php

namespace App\Http\Livewire\Setting;

use App\Models\SettingModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $name, $value, $edit_id;
    public $page_title = 'Home Setting';
    public $update_mode = false;

    protected $rules = [
        'name' => ['required'],
        // 'value' => ['required'],
    ];

    public function mount()
    {
        $this->update_mode = false;  
    }

    public function edit($edit_id)
    {
        $this->edit_id = $edit_id;
        $item = SettingModel::find($edit_id);
        $this->value = $item->value;
        $this->name = $item->name;

        $this->update_mode = true;
    }

    public function update()
    {
        $this->validate();
        // $item = SettingModel::find($this->edit_id);

        $item = SettingModel::find($this->edit_id);
        $item->name = $this->name;
        if ($this->name == 'banner') {
            $item->value = $this->value !== $item->value ? $this->value->store('files', 'public') : $item->value;
        } else {
            $item->value = $this->value;
        }
        $item->update();

        $this->mount();
        $this->update_mode = false;
        session()->flash('message', 'Updated successfully');
    }

    public function back()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.setting.index', [
            'fetch_data' => SettingModel::where('section', '!=', null)
                ->orderBy('created_at')
                ->get()
                ->groupBy(function ($data) {
                    return $data->section;
                }),
        ])->layout('admin.app');
    }
}
