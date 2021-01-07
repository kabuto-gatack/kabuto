@extends('index.mainpage')
@section('title','关于我们')
@section('page','layui-this')
@section('content')
<!-- banner部分 -->
<div class="banner case" style="background: url('/uploads/{{$banner->picture}}') no-repeat center top;">
    <div class="title">
        <p>{{isset($banner->title)?$banner->title:""}}</p>
        <p class="en">{{isset($banner->digest)?$banner->digest:""}}</p>
    </div>
</div>
<!-- main部分 -->
<div class="main-about">
    <div class="layui-container">
        <div class="layui-row">
            <ul class="aboutab">
                <li class="layui-this">公司简介</li><li>招贤纳士</li><li>发展历程</li>
            </ul>
            <div class="tabIntro">
                <div class="content">
                    <div class="layui-inline img"><img src="{{ isset($list->picture)?"/uploads/".$list->picture:'' }}"></div><div class="layui-inline panel">
                        @if(isset($list->contents))
                            {!! $list->contents !!}
                    @endif</div>
                </div>
                <div class="content">
                    <div class="layui-inline panel p_block">
                        @if(isset($list->contents1))
                            {!! $list->contents1 !!}
                        @endif
                    </div><div class="layui-inline img"><img src="{{ isset($list->picture)?"/uploads/".$list->picture1:'' }}"></div>
                </div>
                <div class="content">
                    <div class="layui-inline img"><img src="{{ isset($list->picture)?"/uploads/".$list->picture2:'' }}"></div><div class="layui-inline panel">
                        @if(isset($list->contents2))
                            {!! $list->contents2 !!}
                        @endif
                    </div>
                </div>
            </div>
            <div class="tabJob">
                @foreach($data as $value)
                <div class="content">
                    <p class="title">{{$value->title}}</p>
                    <p>> 职位描述</p>
                    <div class="cont">{!! $value->contents !!}</div>
                </div>
                @endforeach
            </div>
            <div class="tabCour">
                <p class="title">我们的蜕变</p>
                <ul class="timeline">
                    @foreach($result as $key => $value)
                    <li class=" {{($key%2)?'':'odd'}} ">
                        <div class="cour-img"><img src="/uploads/{{$value->picture}}"></div>
                        <div class="cour-panel layui-col-sm4 layui-col-lg5 {{($key%2)?'layui-col-sm-offset8 layui-col-lg-offset7':''}}">
                            <p class="label">{{$value->title}}</p>
                            <p>{{$value->contents}}</p>
                        </div>
                    </li>
                    @endforeach
                    <li class="odd">
                        <div class="cour-img"><img src="{{asset(__INDEX__)}}/res/static/img/us_img8.png"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
