<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Status;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        //验证前台传入数据
        $this->validate($request, [
            'comment_content' => 'required|max:140'
        ]);

        //添加数据库
        Comment::create([
           'content_id' => $request->content_id,
           'comment_content' => $request->comment_content
        ]);

        session()->flash('success', '评论成功！');

        //重定向回主界面
        return redirect()->route('home');

    }


    public function show()
    {
        //获取前台传来的id
        $comment_id=$_GET['status_id'];

        //获取此条微博下的所有微博数据
        $Comment_content = Comment::where('content_id',$comment_id)->get();

        //把json数据传到前台
        return response()->json(array('Comment_content'=> $Comment_content), 200);


    }



}
