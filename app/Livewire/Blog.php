<?php

namespace App\Livewire;

use App\Models\Blog as ModelsBlog;
use Livewire\Component;

class Blog extends Component
{
     public $blogs;

     public $title = '';
     public $body = '';
     public $user_id = '';


    public function save(){
        $validate= $this->validate([
           'title' => 'required',
           'user_id' => 'required',
           'body' => 'required',

        ]);
    //    dd($this->all());
       ModelsBlog::create($validate);
    $this->reset();
    return $this->redirect('/blogs', navigate:true);
    }
    public function render()
    {
        return view('livewire.blog');
    }
    public function mount()
    {
        $this->selectBlogs();
    }

    public function selectBlogs()
    {
        $this->blogs = ModelsBlog::orderBy('created_at', 'DESC')->get();
    }
}
