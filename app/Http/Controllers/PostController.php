<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('id', 'DESC')->get();
        $categories = Category::where('status', 1)->get();
        return view('post.index', compact('posts', 'categories'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $fileName = 'default.jpg';
        if($request->has('images')){
            $file = $request->file('images');
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('uploads/images/'), $fileName);
        }

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->images = $fileName;
        $post->description = $request->description;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->status = $request->status;
        $post->save();

        $category = Post::find($post->id)->category;

        return response()->json([
            'post' => $post,
            'category' => $category
        ]);
    }

    public function show($id)
    {
        $post = Post::with('category')->find($id);
        return response()->json($post);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update(Request $request, Post $post)
    {
        $fileName = $request->oldImg;
        if($request->has('images2')){
            if($request->oldImg !== 'default.jpg'){
                unlink(public_path('uploads/images/').$request->oldImg);
            }


            $file = $request->file('images2');
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('uploads/images/'), $fileName);
        }

        $post->title = $request->title2;
        $post->slug = Str::slug($request->title2);
        $post->images = $fileName;
        $post->description = $request->description2;
        $post->body = $request->body2;
        $post->category_id = $request->category2;
        $post->status = $request->status2;
        $post->save();

        $category = Post::find($post->id)->category;

        return response()->json([
            'post' => $post,
            'category' => $category
        ]);
    }

    public function destroy(Post $post)
    {
        if($post->images !== 'default.jpg'){
            unlink(public_path('uploads/images/').$post->images);
        }
        $post->delete();
        return response()->json(['success' => 'Xoa thanh cong 1 dong']);
    }

    public function deleteChecked(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id){
            $post = Post::find($id);
            if($post->images !== 'default.jpg'){
                unlink(public_path('uploads/images/').$post->images);
            }
        }

        Post::whereIn('id', $ids)->delete();

        return response()->json([
            'messages' => 'Xoa thanh cong cac 1 dong da chon'
        ]);
    }
}
