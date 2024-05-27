<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    // use SoftDeletes;
    // protected $table = "categories";
    // Եթե մի կատեգորիան ունի շատ պոստեր դրա համար գրում ենք posts, 
    // եթե ունենար մեկը կգրեինք եզակի թվով։
    public function posts(){
        // տվյալ օբյեկտը ունի շատ օբյեկտների փոխազդեցություն
        return $this->hasMany(Post::class, 'post_id','id');
    }
   
}