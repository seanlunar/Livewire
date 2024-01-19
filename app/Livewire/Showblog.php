<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use App\Models\BlogLike;
use Illuminate\Support\Facades\Redirect;

class Showblog extends Component
{
    public  $blog, $title, $body, $user_id;
    public $likeStatus = [];

    public function mount(Blog $blog){
        $this->blog = $blog;
        $this->title = $blog->title;
        $this->body = $blog->body;
        $this->user_id = $blog->user_id;
    }


    public function render()
    {
        $likeCount = $this->blog->likes()->count();
        return view('livewire.showblog', compact('likeCount'));
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
        // $this->likeStatus[$id] = !$this->likeStatus[$id] ?? true;

        // $this->selectBlogs();
        // return $this->redirect(url()->current(), ['navigate' => true]);


    }
}
