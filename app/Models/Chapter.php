<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;


    public function hasPosts()
    {
        // dd($this);
        $count = Post::where('chapter_id', $this->id)->count();
        // dd($count);
        if ($count) {
            return true;
        }
        return false;
    }
    
    //* Relationships
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
