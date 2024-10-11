<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    const PATH_VIEW = 'client.';

    public function index()
    {
        $postNew = Post::with('category')->orderBy('created_at', 'desc')->where('IsActive', 1)->get();
        $categories = Category::with('post')->get();
        return view(self::PATH_VIEW . 'home', compact('categories', 'postNew'));
    }

    public function category($id)
    {
        $posts = Post::where('category_id', $id)->get();
        return view(self::PATH_VIEW . 'show.category', compact('posts'));
    }

    public function show($id)
    {
        $posts = Post::with('category')->findOrFail($id);
        $comments = Comment::where('post_id', $id)->with('user')->get();
        $commentCount = $comments->count();
        return view(self::PATH_VIEW . 'show.detail', compact('posts', 'comments', 'commentCount'));
    }

    public function search(Request $request)
    {
        $key = $request->input('key');
        $posts = Post::where('title', 'like', '%' . $key . '%')->get();
        return view(self::PATH_VIEW . 'show.search', compact('posts'));
    }

    public function storeComment(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
        ], [
            'content.required' => 'Vui lòng nhập nội dung bình luận',
        ]);

        $comment = Comment::create([
            'post_id' => $validatedData['post_id'],
            'user_id' => auth()->id(),
            'content' => $validatedData['content'],
        ]);

        return redirect()->route('show', $validatedData['post_id']);
    }
}
