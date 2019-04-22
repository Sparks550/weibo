<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Status;
use Auth;
use DB;


class RepostController extends Controller
{
    public function repost(Request $request)
    {
        //创建新数据
        $status = Status::create([
            'repost_id' => (int)$request->repost_id,
            'content' => $request->repost_text,
            'repost_count' => 0,
            'user_id' => (int)Auth::user()->id,
            'repost_content' => $request->repost_content,
        ]);

        //更改转发次数
        DB::table('statuses')
            ->where('id', $request->repost_id)
            ->update(['repost_count' => $request->repost_count + 1]);

        //查询转发人
        $list = DB::table('statuses')->whereNull('statuses.deleted_at')
            ->join('users', 'users.id', '=', 'statuses.user_id')
            ->select('statuses.repost_content', 'users.name')
            ->where('statuses.repost_id', $request->repost_id)
            ->get();
        session()->flash('success', '转发成功！');

        return redirect('/');
    }

    public function search(Request $request)
    {
        $list = DB::table('statuses')->whereNull('statuses.deleted_at')
            ->join('users', 'users.id', '=', 'statuses.user_id')
            ->select('statuses.repost_content', 'users.name')
            ->where('statuses.repost_id', $request->repost_id)
            ->get();
        return $list;
    }

}
