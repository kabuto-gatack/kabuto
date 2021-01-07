@extends('index.mainpage')
@section('title','产品详情-'.$product->productname)
@section('product','layui-this')
@section('keyword',$product->keyword)
@section('desc',$product->desc)
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
            <p class="news"><a href="{{route('index.product.list')}}">产品展示</a> > {{$product->category->name}}</p>
            <h1>{{$product->productname}}</h1>
            <p class="pushtime">发布时间：<span>{{$product->created_at}}</span></p>
            <p class="introTop">{{$product->remark}}</p>
            <div><img src="/uploads/{{$product->picture}}" alt="{{$product->alt}}"></div>
{{--            <p class="introBott">{{ $product->contents }}</p>--}}
            <div class="introBott">{!! $product->contents !!}</div>
        </div>
    </div>
@endsection
