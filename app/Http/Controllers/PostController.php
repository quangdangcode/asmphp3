<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    const PATH_VIEW = 'admin.posts.';

    public function indexPost()
    {
        $posts = Post::with('category')->where('IsActive', 1)->latest('id')->paginate(8);
        return view(self::PATH_VIEW . 'index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addPost()
    {
        $categories = Category::pluck('name', 'id');
        return view(self::PATH_VIEW . 'create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePost(StorePostRequest $request)
    {
        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
        ];
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('posts', $request->file('image'));
        }
        Post::query()->create($data);
        return redirect()->route('admin.indexPost');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function editPost(Post $post)
    {
        $post->load('category');
        $categories = Category::pluck('name', 'id');
        return view(self::PATH_VIEW . 'edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePost(UpdatePostRequest $request, Post $post)
    {
        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
        ];
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('posts', $request->file('image'));
            Storage::delete($post->image);
        }
        $post->update($data);
        return redirect()->route('admin.indexPost');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletePost(Post $post)
    {
        $post->update(['IsActive' => 0]);
        return redirect()->route('admin.indexPost');
    }

    public function recycleP()
    {
        $posts = Post::with('category')->where('IsActive', 0)->latest('id')->paginate(8);
        return view(self::PATH_VIEW . 'recyclePost', compact('posts'));
    }

    public function recoverPost(Post $post)
    {
        $post->update(['IsActive' => 1]);
        return redirect()->route('admin.indexPost');
    }

}
