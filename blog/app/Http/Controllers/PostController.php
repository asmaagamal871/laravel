<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $allPosts=[
            [
                "id"=>1,
                "title"=>"javaScript",
                "postedBy"=>"Otto",
                "createdAt"=>"2022-08-01 10:00:00"
            ],
            [
                "id"=>2,
                "title"=>"Laravel",
                "postedBy"=>"ahmed",
                "createdAt"=>"2022-08-01 10:00:00"
            ],
            [
                "id"=>3,
                "title"=>"node Js",
                "postedBy"=>"asmaa",
                "createdAt"=>"2022-08-01 10:00:00"
            ],
        ];

        return view("post.index",["posts"=>$allPosts]);
    }

    public function show(){
        $post= [
            "id"=>3,
            "title"=>"node Js",
            "postedBy"=>"asmaa",
            "createdAt"=>"2022-08-01 10:00:00"
        ];
        return view("post.show",["post"=>$post]);
    }
}