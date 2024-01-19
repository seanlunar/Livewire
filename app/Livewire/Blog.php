<?php

namespace App\Livewire;

use App\Models\Blog as ModelsBlog;
use App\Models\BlogLike;
use Livewire\Component;

class Blog extends Component
{
     public $blogs;
     public $likeStatus = [];

     public $liked = false;
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
        $user_id = 1; // Replace with the actual user ID
        $blogIds = BlogLike::where('user_id', $user_id)->pluck('blog_id')->toArray();

        foreach ($blogIds as $blogId) {
            $this->likeStatus[$blogId] = true;
        }
    }

    public function selectBlogs()
    {
        $this->blogs = ModelsBlog::withCount('likes')->orderBy('created_at', 'DESC')->get();
    }

    public function toggleLike($id)
    {
        $user_id = 1; // Replace with the actual user ID

        $existingLike = BlogLike::where('user_id', $user_id)
            ->where('blog_id', $id)
            ->first();

        if ($existingLike) {
            // If the like exists, toggle its value (from 1 to 0 or from 0 to 1)
            $existingLike->like = !$existingLike->like;
            $existingLike->save();
        } else {
            // If the like doesn't exist, create a new like with value 1
            $newLike = new BlogLike();
            $newLike->user_id = $user_id;
            $newLike->blog_id = $id;
            $newLike->like = 1;
            $newLike->save();
        }

        // Update the liked property for dynamic class binding
        $this->likeStatus[$id] = !$this->likeStatus[$id] ;

        $this->selectBlogs();
    }

}
