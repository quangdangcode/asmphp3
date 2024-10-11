<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    const PATH_VIEW = 'admin.comments.';
    
    public function indexComment()
    {
        $comments = Comment::with('post', 'user')->get();
        return view(self::PATH_VIEW.'list', compact('comments'));
    }

    
    public function deleteComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.indexComment');
    }

    public function deleteCommentClient(Comment $comment)
    {
        $comment->delete();
        return back();
    }

    public function deleteCommentClient2(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
