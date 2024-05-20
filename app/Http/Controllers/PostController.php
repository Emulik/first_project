<?php

namespace App\Http\Controllers;
// պետք է import անենք Post class-ը։


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // return "This is my page";
        // $str = "Hello world";
        // dd($str);
        // echo "djhfkhdjkf";
        // $post = Post::find(1);
        // dump($post);
        // dump($post->id);
        // dump($post->title);
        // $posts = Post::all();
        //  dump($posts);
        $posts = Post::all();
        // foreach($posts as $post){
        //     dump($post->title);
        // }
        // dd('end');
        // $posts = Post::where("is_published",1)->get();
        // foreach($posts as $post){
        //     dump($post->title);
        // }
        // dd('end');
        // $post = Post::where('is_published',1)->first();
        // dump($post->title);
        // return view('posts',compact('posts'));
        // return view('posts', [
        //     'posts' => Post::all(),
        // ]);
        // dump(compact("posts"));
        // compact- ստեղծում է զանգված, որը փարունակում է փոփոխականներ
        // և արժեքներ

        return view('post.index',compact('posts'));

    }
    // Ստեղծում ենք տվյալներ
    // public function create(){
    //     Post::create([
    //         'title'=>'some post',
    //         'content'=>' some content',
    //         'image'=>'image1.jpg',
    //         'likes'=> 20,
    //         'is_published'=> 1
    //     ]);
    //     dd('created');
        
    //     // $postsArr=[
    //         // [
    //         //     'title'=>'some post',
    //         //     'content'=>' some interesting content',
    //         //     'image'=>'image.jpg',
    //         //     'likes'=> 25,
    //         //     'is_published'=> 1
    //         // ],
    //         // [
    //         //     'title'=>'another title of post from php',
    //         //     'content'=>' another some interesting content',
    //         //     'image'=>'image1.jpg',
    //         //     'likes'=> 20,
    //         //     'is_published'=> 1
    //         // ],
    //     // ];
    //     // foreach($postsArr as $item){
    //     //     // dd($item);
    //     //     Post::create($item);
    //     // }
    //     // dd('created');

        
    // }
        // petq է view-ի համար առանձին ֆունկցիա ստեղծենք
    public function create(){
        // հիմա կգրենք միայն սա
        return view('post.create');
        // իսկ post.create ֆայլում կլինի մուտքագրման դաշտ որը կավելացնի post-եր։
    }
    public function store(){
        // վերահսկողությոնը թե ինչ տեսակի պետք է լինեն
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
        ]);
        // dd(1111111);
        // dd($data);
        Post::create($data); 
    }
    // public function update(){
    //     // թարմացնելու համար ստանանք որևէ տվյալ
    //     // $post = Post::find(6);
    //     // dump($post->title);
    //     // հիմա թարմացնենք այս posti տվյալները
    //     // $post->update([
    //     //     'title'=>'updated',
    //     //     'content'=>'updated',
    //     //     'image'=>'updated',
    //     //     'likes'=> 100,
    //     //     'is_published'=> 0
    //     // ]);
    //     // dd("updated");

    //     // $post = Post::find(3);
    //     // $post->update([
    //     //     'title'=>'updated title',
    //     //     'likes'=>20
    //     // ]);
    //     // dd("updated");
    // }
    public function delete(){
        // Այս էջում ենք թե ոչ
        // dump('delete page');
        // $post = Post::find(2);
        // $post->delete();
        // dd('deleted');
        // եթե ցանկանում ենք վերականգնել օգտագործում ենք այս տարբերակը։
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restore');
        // բայց այս տարբերակով ջնջելը ճիշտ չէ
        // Այնպես պետք է ջնջել, որ կարողանանք հետո վերականգնել
        // տվյալները օգտագործում ենք soft delete: Կջնջվի, բայց կպահպանվի և ոչ մի տեղ չի երևա:
        // migrations պապկայի մեջ ավելցնում ենք այս տողը $table->softDeletes();
        // և Post class-ում ավելացնել traits use SoftDeletes;
    }

    public function firtsOrCreate(){
        // Եթե մեթոդի մեջ ավելացնենք դատարկ զանգված սա 
        // կլինի վերահսկման համար զանգված և այստեղ կգրենք այն ատրիբուտը, որը
        // մեզ համար հանդիսանում է ունիկալ։
        // Եթե բազայում գտնի title some post արժեքով, ապա կվերադարձնի։
        // եթե չի գտնում ապա այս ամբողջը ավելացնում է
        $post = Post::firstOrCreate([
            'title'=>'new post',
        ],[
            'title'=>'new post',
            'content'=>'some interesting content',
            'image'=>'image1.jpg',
            'likes'=> 50,
            'is_published'=> 1
        ]);
        dump($post->content);
        dd("finished");
    }
    public function updateOrCreate(){
        // updateOrCreate եթե գտնում է այդպիսի արժեք
        // առաջին զանգվածում գրված update կանի իսկ եթե չգտնի
        // կստեղծի։
        $anotherPost = [
            'title'=>'some post not',
            'content'=>"It's not update",
            'image'=>'image1.jpg',
            'likes'=> 15,
            'is_published'=> 0
        ];
        $post = Post::updateOrCreate(
            ['title'=>'some post not'],$anotherPost
        );
        dump($post->content);
        dd("updated");
      
    }
}

