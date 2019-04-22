@extends('layouts.default')
@section('title', '举报页面')
@section('content')
    {{--@if(Auth::check())--}}
    <h1>举报</h1>
    <!--举报原因单选-->
    <h4>请选择举报类型：</h4>
    <form action="{{route('receiveReport')}}" method="post">
        {{ csrf_field() }}
        <div style="font-size: medium">
            <label><input type="radio" name="reportType" value="淫秽色情">淫秽色情</label>
            <label><input type="radio" name="reportType" value="人身攻击">人身攻击</label>
            <label><input type="radio" name="reportType" value="涉嫌抄袭" checked>涉嫌抄袭</label>
            <label><input type="radio" name="reportType" value="违法信息">违法信息</label>
            <label><input type="radio" name="reportType" value="有害信息">涉嫌诈骗</label>
            <label><input type="radio" name="reportType" value="其他">其他</label>
            {{--<input type="text" name="reportContent" placeholder="请补充您要举报的内容.."--}}
                   {{--style="width: 500px;height: 300px" rows="2">--}}
            <input type="hidden" value="{{$id}}" name="content_id">
        </div>
        <textarea name="reportContent"  class="content" cols="60" rows="3" placeholder="请补充您要举报的详细信息..."></textarea>
        <div>
            <button type="submit">提交</button>
        </div>
    </form>
@endsection