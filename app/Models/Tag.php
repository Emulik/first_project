<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function  posts(){
        // վերջին-ը, թե որ դաշտի հետ ա կապված(հարաբերված)
        // Երկրորդը աղյուսակը, երրորդը որ id-ն է foreign -key-ը
        return $this->belongsToMany(Post::class, 'post_tags','tag_id','post_id');
    }
}
