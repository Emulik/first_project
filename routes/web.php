<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return "agfhgfhsa";
});
// Route::get("/my_page", function(){
//     return "This is my page";
// });
// Եթե controller ենք ստեղծում պետք է գրենք նաև այդ բառը
// Կարող ենք այստեղ callback-ը չգրել փոխարենը ֆունկցիան գրել controller-ում որպես
// public function: Եվ երբ ուզում եմ կոնկրետ ասեմ router-ին թե որ ֆունկցիան օգտագործի
// ապա նշում ենք controller-ի անունը և հետ դնում @ և ֆունկցիայի անունը։
Route::get("/posts","PostController@index")->name('post.index');
// CRUD-Ի համար որպեսզի ավելացնենք poste-երը
Route::post("/posts","PostController@store")->name('post.store');
// Կոնկրետ որևէ մեկը
Route::get("/posts/{post}","PostController@show")->name('post.show');

// Ստեղծում ենք Route միայն տվյալների բազայում օբյեկտ սեղծելու համար։
Route::get("/posts/create","PostController@create");

// Ստեղծում ենք Route միայն տվյալները թարմացնելու համար։
Route::get("/posts/update","PostController@update");

// Ստեղծում ենք Route միայն տվյալները ջնջելու համար։
Route::get("/posts/delete","PostController@delete");
// Կոմբինացված մեթոդներ
Route::get("/posts/firts_or_create","PostController@firtsOrCreate");
Route::get("/posts/update_or_create","PostController@updateOrCreate");

// View դասի համար էջերը

Route::get("/about","AboutController@index")->name('about.index');
Route::get("/main","MainController@index")->name('main.index');
Route::get("/contacts","ContactController@index")->name('contact.index');
