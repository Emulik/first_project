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
class StoreController extends Controller
{
    // Այսինքն պետք է տեղեկացնենք laravel-ին , որ class-ի
    // հիման վրա և որ օբյեկտի հետ պետք է աշխատենք և ավտոմատ ստեղծվում է
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        Post::create($data); 
        return redirect()->route('post.store');
    }
  
}


