<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Auth;
use Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'user')->get();
        return response()->json([
            'posts' => $posts

        ], 200);
    }
    public function activePosts()
    {
        return Post::paginate(1);
        // $posts=Post::with('category','user' )->where('status',Post::activeStatus)->paginate(1);
        // return response()->json([
        //     'posts'=>$posts

        // ],200);
    }
    public function categoryPosts($slug)
    {
        $categoryId = Category::where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->where('category_id', $categoryId->id)->get();
        return response()->json([
            'posts' => $posts

        ], 200);
    }
    public function store(Request $request)
    {

        $request->validate([
            "title" => 'required',
            "category_id" => 'required',
            "content" => 'required',
            'status' => 'required'
        ]);
        $file = explode(';', $request->thumnail);
        $file = explode('/', $file[0]);
        $file_ex = end($file);
        $slug = slugify($request->title);
        $file_name = $slug . '.' . $file_ex;
        $post = Post::create([
            "title" => $request->title,
            "category_id" => $request->category_id,
            "user_id" => 1,
            "content" => $request->content,
            "slug" => $slug,
            'thumnail' => $file_name,
            'status' => $request->status,
        ]);
        if ($post) {
            $img = Image::make($request->thumnail)->resize(400, 200)->save(public_path('uploads/posts/') . $file_name);
        }
        return response()->json(['post' => $post], 200);
    }
    public function show($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        return response()->json(['post' => $post], 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            "title" => 'required',
            "category_id" => 'required',
            "content" => 'required',
            'status' => 'required'
        ]);
        $id = $request->id;

        $file = explode(';', $request->thumnail);
        $file = explode('/', $file[0]);
        $file_ex = end($file);
        $slug = slugify($request->title);
        $file_name = $slug . '.' . $file_ex;

        $photo = $request->thumnail;
        $path = public_path('uploads/posts/') . $file_name;
        $arr = [
            "title" => $request->title,
            "category_id" => $request->category_id,
            "user_id" => Auth()->user()->id,
            "content" => $request->content,
            "slug" => $slug,
            'thumnail' => $file_name,
            'status' => $request->status,
        ];
        if (Post::where('id', $id)->update($arr)) {
            if (is_file($path)) {
                unlink($path);
            }
            $img = Image::make($request->thumnail)->resize(400, 201)->save(public_path('uploads/posts/') . $file_name);

            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 200);
        }
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $filename = $post->thumnail;
        $path = public_path('uploads/posts/' . $filename);
        if ($post->delete()) {
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    public function removeItems(Request $request)
    {
        $sl = 0;
        foreach ($request->data as $id) {
            $post = Post::find($id);
            $post->delete();
            $sl++;
        }
        return response()->json(['success' => $sl . ' Post deleted'], 200);
    }
    public function changeStatus(Request $request)
    {
        $sl = 0;
        foreach ($request->data as $id) {
            $post = Post::find($id);
            $post->status = $request->status;
            $post->save();
            $sl++;
        }
        return response()->json(['success' => $sl . ' Post Updated'], 200);
    }
}