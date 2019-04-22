<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Status;
use App\Models\Comment;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'reply_content' => 'required|max:140'
        ]);

        $data = Reply::create([
            'comment_id' => $request->comment_id,
            'reply_content' => $request->reply_content
        ]);

        session()->flash('success', '回复成功！');

        return redirect()->route('reply.content.show', $data->comment_id );
    }

    public function show(Comment $reply)
    {
//dd($reply);
        $reply_content = Reply::where('comment_id', $reply->id)->get();
        $comment = Status::find($reply->content_id);

        $user = User::find($comment->user_id);

        return view('reply.show', compact('reply','comment', 'reply_content', 'user'));

    }
}
