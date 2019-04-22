<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Like;
use Auth;


class LikeController extends Controller
{
    public function update($id)
    {
        $likes = DB::table('likes')->get();
        if (0 === ($likes->count())) {
            //Like表中添加一条记录
            $like = new Like;
            $like->user_id = Auth::id();
            $like->sid = "$id";
            $like->save();

            //更新记录
            //通过主键获取模型
            $statu = Status::find($id);
            $like_count = ($statu->like_count) + 1;
            Status::where('id', $id)->update(['like_count' => $like_count]);
            return redirect()->route('home');
            // Header("Location: http://localhost:1025/");
        } else {
            $i = 0;
            foreach ($likes as $like) {

                if (($like->sid) == ($id)) {

                    $deletedRows = Like::where('sid', $id)->delete();

                    //更新记录
                    //通过主键获取模型
                    $statu = Status::find($id);
                    $like_count = ($statu->like_count) - 1;
                    Status::where('id', $id)->update(['like_count' => $like_count]);
                    return redirect()->route('home');

                    //Header("Location: http://localhost:1025/");
                } else {
                    $i += 1;
                    if ($i === ($likes->count())) {
                        //Like表中添加一条记录
                        $like = new Like;
                        $like->user_id = Auth::id();
                        $like->sid = "$id";
                        $like->save();

                        //更新记录
                        //通过主键获取模型
                        $statu = Status::find($id);
                        $like_count = ($statu->like_count) + 1;
                        Status::where('id', $id)->update(['like_count' => $like_count]);
                        return redirect()->route('home');
                    }


                    //Header("Location: http://localhost:1025/");
                }
            }
        }


    }


}
