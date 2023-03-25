<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Str;
use App\jobs\PruneOldPostsJob;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\WhitespacePathNormalizer;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        $allPosts= Post::paginate(10);
        return view("post.index", ["posts"=>$allPosts]);
    }

    public function removeOldPosts()
    {
        PruneOldPostsJob::dispatch();
        return to_route('posts.index');
    }

    public function show($id)
    {
        $post=Post::where('id', $id)->first();
        return view("post.show", ["post"=>$post]);
    }

    public function create()
    {
        $users=User::all();
        return view("post.create", ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required','min:3','unique:posts,title'],
            'description'=>['required','min:10'],
            'post_creator' => ['required','exists:users,id'],
            'image'=> ['mimes:jpeg,png']
        ]);
        // $image=request()->file('image')->store('public/storage');



        $post = Post::create([
            'title' =>  $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator,
            'slug'=>$request->slug,
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = Storage::putFileAs('public/posts', $image, $filename);
            $post->image = $path;
            $post->save();
        }
        return redirect()->route('posts.index');
    }


    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $users=User::all();
        return view("post.edit")->with('post', $post)->with('users', $users);
    }

    public function update(UpdatePostRequest $request, $id)
    {
try {
    $post = Post::findOrFail($id);

    if ($request->hasFile('image')) {
        if ($post->image) {
            Storage::delete($post->image);
        }
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $path = Storage::putFileAs('public/posts', $image, $filename);
        $post->image = $path;
    }

    $post->update([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'user_id' => $request->post_creator,
    ]);





    // dd($post->image);
    // if ($request->image) {
        //     // dd($request->image);
        //     // dd("hiiiii");
        //     // if ($post->image) {
        //     //     Storage::delete($post->image);
        //     // }
        //     $image = $request->file('image');
        //     $filename = $image->getClientOriginalName();
        //     $path = Storage::putFileAs('public/posts', $image, $filename);
        //     $post->image = $path;
    // }

    // $title= $request->title;

    // $description=$request->description;
    // $postCreator=$request->post_creator;
    // if ($post->title!=$title) {
        //     $post->title=$title;
    // }if ($post->description!=$description) {
        //     $post->description=$description;
    // }if ($post->user_id!=$postCreator) {
        //     $post->user_id=$postCreator;
    // }

        $post->save();
        return redirect()->route('posts.index');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->back()
            ->with('error', 'An error occurred while updating the item.');
    }
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if ($post->image && Storage::exists($post->image)) {
            Storage::delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
