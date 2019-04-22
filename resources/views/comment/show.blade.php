@extends('layouts.default')
<div>
<li id="status-{{ $comment->id }}">
    <a href="{{ route('users.show', $user->id )}}">
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
    </a>

    <span class="user">
    <a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a>
    </span>

    <span class="timestamp">
    {{ $comment->created_at->diffForHumans() }}
    </span>

    <span class="content">{{ $comment->content }}</span>


    @can('destroy', $comment)
        <form action="{{ route('statuses.destroy', $comment->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger status-delete-btn">删除</button>
        </form>
    @endcan
</li>
</div>



{{--<div>
    <h2>微博内容：</h2>
    <span>{{ $comment->content }}</span>
</div>--}}

<div>
    <h2>评论内容:</h2>
    @foreach($Comment_content as $content)

        <form action="{{ route('reply.content', $content->id) }}" method="post">

            @include('shared._errors')
            {{ csrf_field() }}
            <div class="container">

                <input type="hidden" name="comment_id" value="{{ $content->id }}">

                <span class="timestamp">
    {{ $content->created_at->diffForHumans() }}
    </span>
            <li>{{ $content->comment_content }}</li>
            <textarea name="reply_content"  cols="60" rows="1" style="float: left; resize: none;" ></textarea>
            <button type="submit">提交回复</button>

            </div>

        </form>
    @endforeach
</div>

