<?php

namespace App\Http\Controllers;

// պետք է import անենք Post class-ը։


use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
      
        // $post = Post::all();
        // dump($post);
        // $category = Category::find(1);
        // $posts = Post::where('category_id',$category->id)->get();
        // dd($posts);


        // $post = Post::find(1);
        // dd($post->category);
        // Այնպես անենք որ տեսնենք teп-երը

        // $post = Post::find(1);
        // dd($post->tags);
        // Գնում ենք model Post 
        // Եվ էջը թարմացնելիս տեսնում ենք տեգերը
       
        // նույնը անում ենք tag-երի համար։
        // $tag = Tag::find(1);
        // dd($tag->posts);
        // պետք է import անենք Tag Model-ի class-ը

        // Create-ից հետո
        $posts = Post::all();
        return view('post.index', compact('posts'));




    }
    // Ստեղծում ենք տվյալներ
    public function create(){
        // Post::create([
        //     'title'=>'some post',
        //     'post_content'=>' some content',
        //     'image'=>'image1.jpg',
        //     'likes'=> 20,
        //     'is_published'=> 1
        // ]);
        // dd('created');
        
        // $postsArr=[
        //     [
        //         'title'=>'some post',
        //         'post_content'=>' some interesting content',
        //         'image'=>'image.jpg',
        //         'likes'=> 25,
        //         'is_published'=> 1
        //     ],
        //     [
        //         'title'=>'another title of post from php',
        //         'post_content'=>' another some interesting content',
        //         'image'=>'image1.jpg',
        //         'likes'=> 20,
        //         'is_published'=> 1
        //     ],
        // ];
        // foreach($postsArr as $item){
            // dd($item);
    //         Post::create($item);
        // }
        // dd('created');
        // return view('post.create');
        // Հաջորդ դաս tag-երի ստեղծելու համար
        // Bootstrap-ում form control
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories','tags'));
        // Հաջորդ-ը store-ֆունկցիայում պետք է ավելացնենք



        
    }
     
    // public function create(){
    //     // հիմա կգրենք միայն սա
    //     return view('post.create');
    //     // իսկ post.create ֆայլում կլինի մուտքագրման դաշտ որը կավելացնի post-եր։
    // }
    public function edit(Post $post){
        // put եթե մի բան ավելացնում ենք, իսկ եթե թարմացնում ենք patch
        // return view('post.edit', compact('post'));

        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post','categories','tags'));
        // Ցույց ենք տալիս,  թե օգտատերը ինչ սխալներ է թույլ տվել։
    }
    public function store(){
        // վերահսկողությոնը թե ինչ տեսակի պետք է լինեն
        // Այստեղ ավելացնելով category_id արդեն կստեղծվի ինչ-որ կատեգորիային կապված
        $data = request()->validate([
            'title'=>'string',
            'post_content'=>'string',
            'image'=>'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
       
        // եվ տպենք $date
        // dd(1111111);
        // dd($data);
        // Սա կփակենք և կստեղծվի նոր post caterory-յի հետ կապված։
        // Post::create($data); 
        // return redirect()->route('post.index');
         // Բայց խնդիր է առաջանում data-ում ավելացվում է tags եթե ցանկանամ ստեղծել post 
        // այս data-ով կվեր ադարձնի Error: Չկա ատտրիբուտ tags  posts աղյուսակում։
        $tags = $data['tags'];
        unset($data['tags']);

        // dd($tags, $data);
        // որպեսզի առանձին ստեղծել պահենք փոփոխականի մեջ
        // $post = Post::create($data); 
        // return redirect()->route('post.index');
        
        $post = Post::create($data);
        // foreach($tags as $tag){
        //     PostTag::firstOrCreate([
        //         'tag_id'=>$tag,
        //         'post_id'=>$post->id,
        //     ]);
        // }
        // Հաջորդ տարբերակը

        // Կանչում ենք Post model-ի tags մեթոդը և դարձնում ենք հարցում db: 
        // Այստեղ նշում ենք վերցրու post-ը այնտեղ կան տեգեր։
        // post-երը Միացրու teg-երին
        $post->tags()->attach($tags);

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
    public function update(Post $post){
        $data = request()->validate([
            'title'=>'string',
            'post_content'=>'string',
            'image'=>'string',
            'category_id'=>'',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        // dd($data);
        $post->update($data);
        // $post = $post->fresh();
        // $post ->tags()->attach($tags);
        // Որպեսզի DB-ում նշվածները ջնջի և ավելացնի այն որը նշում ենք
        $post ->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);

    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }
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
    // public function show($id){
    //     $post = Post::find($id);
    //     // Այս մեթոդը նրա համար է, եթե այդպիսի id - ում տվյալ չլինի
    //     // վերադարձնի user -ի համար հարմար էջ։
    //     $post = Post::findOrFail($id);
    //     dd($post->title);
    // } 
    // երկրորդ գրելաձևը non found-ի համար։ս
    // Գրում ենք Model Post Laravel-ը այդ ամենը կանի մեր փոխարեն
    public function show(Post $post){
        // dd($post->title);
        return view('post.show', compact('post'));
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


