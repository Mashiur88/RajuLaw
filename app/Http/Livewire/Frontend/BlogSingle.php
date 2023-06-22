<?php

namespace App\Http\Livewire\Frontend;

use App\Models\GuideLineModel;
use App\Models\ImmigrationNewsModel;
use Livewire\Component;

class BlogSingle extends Component
{
    public $page_title, $post;

    public function mount($type, $slag)
    {
        if ($type == "immigration") {
            $this->post = ImmigrationNewsModel::where('slag',$slag)->first();
            $this->page_title = $this->post->title;
        }else {
            $this->post = GuideLineModel::where('slag',$slag)->first();
            $this->page_title = $this->post->title;
        }
    }
    public function render()
    {
        return view('livewire.frontend.blog-single')->layout('frontend.app');
    }
}
