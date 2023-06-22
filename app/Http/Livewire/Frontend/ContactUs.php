<?php

namespace App\Http\Livewire\Frontend;

use App\Models\contactinfo;
use App\Models\ContactUsModel;
use Livewire\Component;

class ContactUs extends Component
{
    public $name,$email,$phone,$message;

    public function send_message()
    {
        $contact = new ContactUsModel();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->message = $this->message;
        $contact->save();

        session()->flash('message', 'Send successfully');
    }

    public function render()
    {
        return view('livewire.frontend.contact-us',['contact'=>contactinfo::all()])->layout('frontend.app');
    }
}
