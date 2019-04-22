<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'reply_content', 'reply_count', 'comment_id',
    ];

    //只能回复一个评论
    public function hasOneComment()
    {
        return $this->belongsTo('App\Comment');
    }
}
