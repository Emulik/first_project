<?php

namespace App\Http\Controllers\Post;
// պետք է import անենք Post class-ը։

// Իմպորտ անելու համար ctrl+Alt+I 
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Ինչպես իրականացնել մի մեթոդ ունեցող կոնտրոլլեր։
// php oop կա հատուկ մեթոդ կոչվում է invoke(): Սա նշանակում է որբ route-ից 
// անրադառնանք այս class-ին առաջինը կաշխատի այս մեթոդը
class IndexController extends Controller
{
    public function __invoke(Post $posts){
        $posts = Post::all();
        return view('post.index',compact('posts'));
    }
    // Այսպիսի controler-ներ պետք է ունենանք 7 հատ
}

