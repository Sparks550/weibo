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





<div>


        <form action="{{ route('reply.content', $reply->id) }}" method="post">

            @include('shared._errors')
            {{ csrf_field() }}
            <div class="container">


                <h1 style="">评论内容:</h1>
                <l>{{ $reply->comment_content }}</l>

                <h3>回复内容:</h3>
            @foreach($reply_content as $replay_contents)

                    <li>{{ $replay_contents->reply_content }}</li>

            @endforeach

            </div>

        </form>

</div>

