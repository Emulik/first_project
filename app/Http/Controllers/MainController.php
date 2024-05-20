<?php

namespace App\Http\Controllers;
// պետք է import անենք Post class-ը։


use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller{
    public function index(){
        return view('main');
    }


}

