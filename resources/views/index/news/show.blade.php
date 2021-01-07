@extends('index.mainpage')
@section('title','新闻详情-'.$news->newstitle)
@section('news','layui-this')
@section('keyword',$news->keyword)
@section('desc',$news->desc)
@section('content')
    <!-- banner部分 -->
    @if(!empty($banner))
        <div class="banner product" style="background: url('/uploads/{{$banner->picture}}') no-repeat center top;">
            <div class="title">
                <p>{{isset($banner->title)?$banner->title:""}}</p>
                <p class="en">{{isset($banner->digest)?$banner->digest:""}}</p>
            </div>
        </div>
     @endif
    <!-- main部分 -->
    <div class="main-newsdate">
        <div class="layui-container" style="word-break: break-all;">
            <p class="news"><a href="{{route('index.news.list')}}">实时新闻 </a> > 新闻详情</p>
            <h1>{{$news->newstitle}}</h1>
            <p class="pushtime">发布时间：<span>{{$news->created_at}}</span></p>
            <p class="introTop">{{$news->remark}}</p>
            <div><img src="/uploads/{{$news->picture}}" alt="产品详情图" style="width: 1200px;"></div>
{{--            <p class="introBott">{{ $product->contents }}</p>--}}
            <div class="introBott">{!! $news->contents !!}</div>
        </div>
    </div>
@endsection
