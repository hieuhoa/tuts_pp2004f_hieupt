<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function newComment(CommentFormRequest $request)
    {   
        $user_id = Auth::user()->id;
        $comment = new Comment([
                 'post_id' => $request->get('post_id'),
                 'content' => $request->get('content'),
                 'post_type'=>$request->get('post_type'),
                 'user_id'=>$user_id
            ]);
        $comment->save();
        return redirect()->back()
        ->with('status', 'Your comment has been created!');
        
    }
}
