@extends('index.mainpage')
@section('title','客户案例')
@section('cases','layui-this')
@section('content')
<!-- banner部分 -->
@if(!empty($banner))
    <div class="banner case" style="background: url('/uploads/{{$banner->picture}}') no-repeat center top;">
        <div class="title">
            <p>{{isset($banner->title)?$banner->title:""}}</p>
            <p class="en">{{isset($banner->digest)?$banner->digest:""}}</p>
        </div>
    </div>
@endif
<!-- main部分 -->
<div class="main-case">
    <div class="layui-container">
        <div class="layui-row">
            @foreach($list as $key => $value)
                <div class="layui-inline content even {{($key == '1' or $key == '4')?'center':''}}">
                    <div class="layui-inline case-img"><img src="/uploads/{{$value->picture}}" alt="{{$value->alt}}"></div>
                    <p class="lable">{{$value->titile}}</p>
                    <p>{{$value->remark}}</p>
                </div>
            @endforeach
        </div>
        <div id="casePage">{{ $list->links('vendor.pagination.default') }}</div>
    </div>
</div>
@endsection
