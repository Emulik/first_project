<?php

namespace App\Http\Controllers;
// պետք է import անենք Post class-ը։


use App\Models\Post;
use Illuminate\Http\Request;

class AboutController extends Controller{
    public function index(){
        return view('about');
    }


}
