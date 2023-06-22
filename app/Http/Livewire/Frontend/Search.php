<?php

namespace App\Http\Livewire\Frontend;

use App\Models\FaqChildModel;
use App\Models\GuideLineModel;
use App\Models\ImmigrationNewsModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $page_title = "search result", $search_data, $search_keyword;


    public function mount($search)
    {
        $result1 = GuideLineModel::select('id','type','title','desc','slag')->orwhere('title', 'LIKE', '%' . $search . '%')->orwhere('desc', 'LIKE', '%' . $search . '%');

        $result2 = ImmigrationNewsModel::select('id','type','title','desc','slag')->orwhere('title', 'LIKE', '%' . $search . '%')->orwhere('desc', 'LIKE', '%' . $search . '%');

        $result3 = FaqChildModel::select('id','type','title','desc','slag')->orwhere('title', 'LIKE', '%' . $search . '%')->orwhere('desc', 'LIKE', '%' . $search . '%');

        $data = $result3->union($result1)->union($result2)->get();
        $this->search_data = $data;
        // dd($this->search_data);
    }



    public function render()
    {
        return view('livewire.frontend.search')->layout('frontend.app');
    }
}
