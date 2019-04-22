<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'comment_content', 'comment_count', 'content_id',
    ];

    //一个评论可以有多个回复，一对多
/*    public function hasManyReplies()
    {
        return $this->hasMany('App\Reply');
    }*/

    public function Status()
    {
        return $this->belongsTo(Status::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
