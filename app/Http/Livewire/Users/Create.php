<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $page_title = "Create Admin User";

    public $name, $email, $password;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'created successfully');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.users.create')->layout('admin.app');
    }
}
