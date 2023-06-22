<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{
    public $page_title = "Update Admin user";

    public $name, $email, $password, $user_id;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['string', 'min:8'],
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount($user_id)
    {
        $this->user_id = $user_id;
        $member = User::find($user_id);
        $this->name = $member->name;
        $this->email = $member->email;
    }

    public function update()
    {
        $member_update = User::find($this->user_id);
        $member_update->name  = $this->name;
        $member_update->email  = $this->email;
        $member_update->password  = Hash::make($this->password);
        $member_update->update();

        session()->flash('message', 'User Updated successfully');
        $this->mount($this->user_id);
    }

    public function render()
    {
        return view('livewire.users.edit')->layout('admin.app');
    }
}
