<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'body','user_id'
    ];
      public $timestamps = true;

      public function likes()
    {
        return $this->belongsToMany(User::class, 'blog_likes')->where('like', 1);
    }
}
