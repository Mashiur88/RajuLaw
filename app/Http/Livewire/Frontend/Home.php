<?php

namespace App\Http\Livewire\Frontend;

use App\Models\FaqChildModel;
use App\Models\FaqModel;
use App\Models\ImmigrationNewsModel;
use App\Models\MeedRajuModel;
use App\Models\ServiceModel;
use App\Models\Team;
use App\Models\Techmodel;
use App\Models\TestimonialModel;
use Livewire\Component;

class Home extends Component
{
    public $page_title = "Home";
    public $team_member,$faqs,$service_item,$meet_raju,$testimonial,$immigration_news,$selected_faq,$tech;

    public function mount()
    {
        $this->team_member = Team::orderBy('order')->get();
        $this->faqs = FaqModel::where('parent_id',"!=",0)->limit(4)->get();
        // inRandomOrder()->limit(5)->get()
        $this->selected_faq = $this->faqs->first();
        $this->meet_raju = MeedRajuModel::all();
        $this->service_item = ServiceModel::all();
        $this->testimonial = TestimonialModel::all();
        $this->immigration_news = ImmigrationNewsModel::all()->take(3);
        $this->tech = Techmodel::all();
    }

    public function selected_faq($clicked_faq)
    {
        $this->selected_faq = FaqModel::find($clicked_faq);
    }

    public function render()
    {
        return view('livewire.frontend.home')->layout('frontend.app');
    }
}
