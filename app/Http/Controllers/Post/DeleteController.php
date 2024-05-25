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
class DeleteController extends Controller
{
    public function __invoke(Post $post){
        // $post = Post::withTrashed()->find(2);
        // $post->restore();
        // dd('restore');
        $post->delete();
        return redirect()->route('post.index');

    }
  
}

