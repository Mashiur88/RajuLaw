<?php

namespace App\Http\Livewire\Frontend;

use App\Models\LegalFeesModel;
use Livewire\Component;

class LegalFees extends Component
{

    public $page_title = "Legal Fees";

    public function render()
    {
        return view('livewire.frontend.legal-fees',[
            'legal_fees'=>LegalFeesModel::all()
        ])->layout('frontend.app');
    }
}
