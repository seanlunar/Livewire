<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

class Showblog extends Component
{
    public  $blog, $title, $body, $user_id;

    public function mount(Blog $blog){
        $this->blog = $blog;
        $this->title = $blog->title;
        $this->body = $blog->body;
        $this->user_id = $blog->user_id;
    }


    public function render()
    {
        return view('livewire.showblog');
    }
}
