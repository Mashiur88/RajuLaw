<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\GuideLineModel;
use App\Models\ImmigrationNewsModel;
use App\Models\ServiceModel;
use App\Models\Team;
use Livewire\Component;

class Dashboard extends Component
{
    public $page_title = "Dashboard";
    public $services,$team,$immegration,$guideline;


    public function mount()
    {
        $this->services = ServiceModel::count();
        $this->team = Team::count();
        $this->immegration = ImmigrationNewsModel::count();
        $this->guideline = GuideLineModel::count();
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard')->layout('admin.app');
    }
}
