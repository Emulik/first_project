<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    // public $ownProperty;
    // այստեղ կարող ենք փոխել և գրել թե մոդելը, որ աղյուսակի հետ է կապված։
    protected $table = "posts";
    // Այս հատկությունը ավելացնում ենք, որպեսզի թույլ տա տվյալներ ավելացնենք։
    // Սա նշանակում է, որ պաշտպանել պետք չէ ոչ մի ատրիբուտ։
    protected $guarded=[]; 
    // կամ
    // protected $guarded=false; 

    // protected $fillable=['title','content'];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function  tags(){
        // վերջին-ը, թե որ դաշտի հետ ա կապված(հարաբերված)Post-ը
        // Երկրորդը աղյուսակը, երրորդը որն է post-երի id-ն է foreign -key-ը
        return $this->belongsToMany(Tag::class, 'post_tags','post_id','tag_id');
    }
}
