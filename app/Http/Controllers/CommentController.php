<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Publication;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');//->except('index', 'show');
    }

    public function store(Request $request)
    {

        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->parent_id = 0;
        $comment->user()->associate($request->user());
        $pub = Publication::find($request->get('pub_id'));
        $pub->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $pub = Publication::find($request->get('pub_id'));

        $pub->comments()->save($reply);

        return back();

    }

}
