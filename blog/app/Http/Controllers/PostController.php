<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    public function index(){
      $allPosts= Post::paginate(10);
             return view("post.index",["posts"=>$allPosts]);
    }

    public function show($id){
        $post=Post::where('id',$id)->first();
        return view("post.show",["post"=>$post]);
    }

    public function create(){
        $users=User::all();
        return view("post.create", ['users' => $users]);
    }

    public function store(){
        $title= request()->title;
        $description=request()->description;
        $postCreator=request()->post_creator;
        Post::create([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$postCreator,
            
        ]);
        return redirect()->route('posts.index');
    }

    public function edit($id){
        $post = DB::table('posts')->where('id', $id)->first();
        $users=User::all();
        return view("post.edit")->with('post',$post)->with('users',$users);
    }

    public function update($id){
        $post=Post::find($id);
        $title= request()->title;
        $description=request()->description;
        $postCreator=request()->post_creator;
        if($post->title!=$title){
            $post->title=$title;
        }if($post->description!=$description){
            $post->description=$description;
        }if($post->user_id!=$postCreator){
            $post->user_id=$postCreator;
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    public function delete($id){
        
        $post= DB::table('posts')->where('id',$id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
