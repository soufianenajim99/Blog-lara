<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){   
        $posts=Post::filter()->get();
        $posts=$this->getPosts() ;
        return view("post.posts",[
            "posts"=> $posts->get()
        ]);
    }


    public static function getPosts(){
        $posts = Post::latest();
        if(request('search')){
            $posts
            ->where('title','like','%'.request('search').'%')
            ->orWhere('body','like','%'.request('search').'%');
        }
        return $posts;
    }
}