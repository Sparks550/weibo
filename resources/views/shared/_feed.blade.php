@if(count($feed_items))
    <ol class="statuses">
        @foreach($feed_items as $status)
            @include('statuses._status', ['user' => $status->user])
        @endforeach
        {!! $feed_items->render() !!}
    </ol>
    {{--//弹出框--}}
    <div class="theme-popover" style="width:700px ; height:500px">
        <div class="theme-poptit">
            <a href="javascript:;" title="关闭" class="close" style="color:black">×</a>
            <h3></h3>
        </div>
        <div class="theme-popbod dform">
            <form class="theme-signin" name="loginform" action="repost" method="post">
                {{ csrf_field() }}
                <ol>
                    <li>转发到
                        <ul>
                            <li>我的微博</li>
                            <li>好友圈</li>
                            <li>私信</li>
                        </ul>
                    </li>
                    <li>转发内容
                        <div>
                            <input id="repost_id" type="text" style="width:320px; height:100px" name="repost_id">
                            <input id="repost_text" type="text" style="width:320px; height:100px" name="repost_text"
                                   readonly>
                            <input id="repost_count" type="text" style="width:320px; height:100px" name="repost_count"
                                   hidden="hidden">
                        </div>
                    </li>
                    <li>
                        我想说:<br>
                        <input type="text" name="repost_content" id="repost_content">
                    </li>
                    <li>
                        <button>转发</button>
                    </li>
                </ol>
                -- 当前已转发 <input type="text" id="count" value="" style="width:40px" disabled> 次--
            </form>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="/css/lanrenzhijia.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script type="text/javascript" src="/js/jquery-1.2.0.min.js"></script>
    <script>
        function reposted(id, content, repost_count) {
            document.getElementById('repost_text').value = content;
            document.getElementById('repost_id').value = id;
            document.getElementById('repost_count').value = repost_count;
            document.getElementById('count').value = repost_count;

            $('.theme-popover-mask').fadeIn(100);
            $('.theme-popover').slideDown(200);
//            window.open('.theme-popover-mask','','width=200,height=100');
            $('.theme-poptit .close').click(function () {
                $('.theme-popover-mask').fadeOut(100);
                $('.theme-popover').slideUp(200);
            })
        }
    </script>
@endif