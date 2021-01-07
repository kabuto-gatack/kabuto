@extends('index.mainpage')
@section('title',isset($config['site']->sitename)?$config['site']->sitename:"")
@section('home','layui-this')
@section('keyword',$config['site']->sitekeywords)
@section('desc',$config['site']->sitedesc)
@section('content')
<!-- banner部分 -->
<div>
    <div class="layui-carousel" id="banner">
        <div carousel-item>
            @if(!empty($banner))
            @foreach($banner->banneritem as $item)
                <div>
                    <img src="/uploads/{{$item->picture}}">
                    <div class="panel">
                        <p class="title">{{$item->title}}</p>
                        <p>{{$item->digest}}</p>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<!-- main部分 -->
<div class="main-product">
    <div class="layui-container">
        <p class="title">专为前端而研制的<span>核心产品</span></p>
        <div class="layui-row layui-col-space25">
            @if(!empty($product))
                @foreach($product as $k=>$p)
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="content">
                        <div><img src="{{__INDEX__}}/res/static/img/Big_icon{{$k+1}}.png" alt="{{$p->alt}}"></div>
                        <div>
                            <p class="label">{{$p->productname}}</p>
                            <p>{{$p->remark}}</p>
                        </div>
                        <a href="javascript:;">查看产品 ></a>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<div class="main-service">
    <div class="layui-container">
        <p class="title">为客户打造完美的<span>客户案例</span></p>
        <div class="layui-row layui-col-space25 layui-col-space80">
            @if($cases)
                @foreach($cases as $value)
                <div class="layui-col-sm6">
                    <div class="content">
                        <div class="content-left"><img src="/uploads/{{$value->picture}}" alt="{{$value->alt}}"></div>
                        <div class="content-right">
                            <p class="label">{{$value->title}}</p>
                            <span></span>
                            <p>{{$value->remark}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div class="service-more"><a href="{{route("index.cases.index")}}">查看更多</a></div>
    </div>
</div>
@endsection

