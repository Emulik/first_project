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
class UpdateController extends Controller
{
    public function __invoke( UpdateRequest $request, Post $post){
        $data = $request->validated();
        // $post = Post::updateOrCreate(
        //     ['title'=>'some post not'],$anotherPost
        // );
        // dump($post->content);
        // dd("updated");
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags($data)->sync($tags);
        return redirect()->route('post.show', $post->id);
    }
  
}

