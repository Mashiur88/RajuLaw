<?php

namespace App\Http\Livewire\Frontend;

use App\Models\FaqChildModel;
use App\Models\GuideLineModel;
use App\Models\ImmigrationNewsModel;
use App\Models\LegalFeesChildModel;
use App\Models\LegalFeesModel;
use App\Models\ServiceChieldModel;
use App\Models\ServiceModel;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $page_title = "search oyt", $search_data, $search_keyword;


    public function mount($search)
    {
        $searchArea = [
            GuideLineModel::class =>
                ['title', 'plain_desc'],
            ImmigrationNewsModel::class =>
                ['title', 'plain_desc'],
            FaqChildModel::class =>
                ['title', 'plain_desc'],
            ServiceModel::class =>
                ['name'],
            ServiceChieldModel::class =>
                ['name','plain_desc'],
            Team::class =>
                ['name', 'designation', 'plain_about'],
            LegalFeesModel::class =>
                ['name', 'note', 'first_part', 'second_part'],
            LegalFeesChildModel::class =>
                ['section_name', 'lebel', 'tag',]

        ]; 
 
        $results = [];

        foreach ($searchArea as $model => $columns) {
            $tableName = app($model)->getTable();
            $columns = Schema::getColumnListing($tableName);
            $temp = $model::select([...$columns, DB::raw("'" . $tableName . "' as table_name")]);
            foreach ($columns as $column) {
                $temp->orwhere($column, 'LIKE', '%' . $search . '%');
            }

            if($model == ServiceChieldModel::class){
                $temp->with('parent_service');
            } 
            if($model == LegalFeesChildModel::class){
                $temp->with('legalFees');
            }
            if ($model == ServiceModel::class) {
                $temp->with('chirld_services');
                $data = $temp->first();
                if(!$data){ continue; }
                foreach ($data->chirld_services as $chirld_service){
                    $tableName = app($model)->getTable();
                    $parentData=[
                        'slug'=>$data->slug,
                    ];
                    $results[] = [[...$chirld_service->toArray(),'table_name'=>'service_chield','parent_service'=>$parentData]];
                }
            }
            else{
                $results[] = $temp->get()->toArray();
            }

        }
        $data = array_merge(...$results);

        $this->search_data = $data;
        // dd($this->search_data);
    }


    public function render()
    {
        return view('livewire.frontend.search')->layout('frontend.app');
    }
}
