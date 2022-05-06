<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\About;
use App\Models\Skill;
use App\Models\Blog;

class FrontController extends Controller
{
    public function index(){
        $home=Home::orderBy('id','desc')->first();
        $about = About::orderBy('id','desc')->first();
        $skill=Skill::orderBy('id','desc')->take(5)->get();
        $blog=Blog::orderBy('id','desc')->take(3)->get();
        return view ('front.index', compact('home','about','skill','blog'));
       }

    public function blogDetail($id){
        $blog=Blog::findOrFail($id);
       
        return view('front.single' ,compact('blog'));
       }
    }

