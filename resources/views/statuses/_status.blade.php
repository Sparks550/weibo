<li id="status-{{ $status->id }}">
    <a href="{{ route('users.show', $user->id )}}">
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
    </a>

    <span class="user">
    <a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a>
    </span>

    <span class="timestamp">
    {{ $status->created_at->diffForHumans() }}
  </span>

    <span class="content">转发原因：{{ $status->repost_content }}</span>
    <span class="content">{{ $status->content }}</span>

    {{--增加转发评论点赞--}}
    <div class="content">

        {{--转发功能所在--}}
        <span><a href="javascript:void(0);" onclick="reposted(' {{$status->id }} ', ' {{$status->content }} ',
                    '{{ $status->repost_count }}')">转发</a>
                <span style="font-size: 8px">({{ $status->repost_count}})</span>
        </span>


        <span><a href="{{route('like',$status->id)}}">点赞</a></span>
        <span style="font-size: 8px">({{$status->like_count}})</span>


        @can('destroys',$status)
        <span><a href="{{ route('report', $status->id )}}">举报</a></span>
        @endcan
    </div>


    @can('destroy', $status)
    <form action="{{ route('statuses.destroy', $status->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger status-delete-btn">删除</button>
    </form>
    @endcan
</li>

<li>
    <form action="{{ route('comment.content', $status->id) }}" method="post">
        @include('shared._errors')
        {{ csrf_field() }}
        <div class="container">
            <input type="hidden" id="status_id" name="content_id" value="{{ $status->id }}">

            <textarea name="comment_content" class="content" cols="55" rows="2" placeholder="发表下你的看法吧..."></textarea>
            <button type="submit" class="content" style="float: left; resize: none;font-size: 10px">提交评论</button>
            <a href="javascript:void(0)" id="status_id" onclick="selectComment({{ $status->id }})"  class="content"
                style="font-size: 18px">查看评论
            </a>

        </div>

        {{--为每条微博下设置不同id的div块--}}
        <ul id="comment_content{{ $status->id }}"></ul>

    </form>
</li>


<script>
    /*实现点击评论出现评论内容代码*/
    function selectComment(status_id) {

        //接收并处理后台传来的json数据
        $.ajax({
            type: "get",
            url: "comment",
            dataType: "json",
            cache: false,
            data: {
                status_id: status_id,
                _token: "{{ csrf_token() }}"
            },

            success: function (Comment_content) {
                // console.log(Comment_content);
                // console.log(Comment_content['Comment_content'].length);

                var dataObj = Comment_content['Comment_content'];
                var con = "";

                $.each(dataObj, function (index, item) {
                    con += "<li>评论内容：" + item.comment_content + "</li>";
                });

                //console.log(con);
                //把不同的id赋值给变量
                var comments = "#comment_content" + status_id;
                $(comments).html(con);

            },
        })
    }
</script>