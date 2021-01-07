<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta name="keywords" content="@yield('keyword')">
    <meta name="description" content="@yield('desc')">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset(__INDEX__)}}/res/layui/css/layui.css">
    <link rel="stylesheet" href="{{asset(__INDEX__)}}/res/static/css/index.css">
    <style>
        .cont p{display: inline;}
    </style>
</head>
<body>
<!-- nav部分 -->
<div class="nav index">
    <div class="layui-container">
        <!-- 公司logo -->
        <div class="nav-logo">
            <a href="index.html">
                <img src="{{asset(__INDEX__)}}/res/static/img/logo.png" alt="易风课堂">
            </a>
        </div>
        <div class="nav-list">
            <button>
                <span></span><span></span><span></span>
            </button>
            <ul class="layui-nav" lay-filter="">
                <li class="layui-nav-item @yield('home')"><a href="{{route('index.home')}}">首页</a></li>
                <li class="layui-nav-item @yield('product')"><a href="{{route('index.product.list')}}">产品</a></li>
                <li class="layui-nav-item @yield('news')"><a href="{{route('index.news.list')}}">动态</a></li>
                <li class="layui-nav-item @yield('cases')"><a href="{{route('index.cases.index')}}">案例</a></li>
                <li class="layui-nav-item @yield('page')"><a href="{{route('index.page.index')}}">关于</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- banner部分 -->
@yield('content')
<!-- footer部分 -->
<div class="footer">
    <div class="layui-container">
        <p class="footer-web">
            <span><a href="javascript:;">友情链接：</a></span>
            @foreach($friend as $value)
                <a href="{{$value->url}}" rel="nofollow" target="_blank">{{$value->title}}</a>
            @endforeach
        </p>
        <div class="layui-row footer-contact">
            <div class="layui-col-sm2 layui-col-lg1"><img src="{{asset(__INDEX__)}}/res/static/img/erweima.jpg"></div>
            <div class="layui-col-sm10 layui-col-lg11">
                <div class="layui-row">
                    <div class="layui-col-sm6 layui-col-md8 layui-col-lg9">
                        <p class="contact-top"><i class="layui-icon layui-icon-cellphone"></i> {{isset($config['information']->hotline)?$config['information']->hotline:""}}&nbsp;&nbsp;&nbsp;(9:00-18:00)</p>
                        <p class="contact-bottom"><i class="layui-icon layui-icon-home"></i>&nbsp;{{isset($config['information']->email)?$config['information']->email:""}}</p>
                    </div>
                    <div class="layui-col-sm6 layui-col-md4 layui-col-lg3">
                        <p class="contact-top"><span class="right">{{isset($config['information']->address)?$config['information']->address:""}}</span></p>
                        <p class="contact-bottom"><span class="right">Copyright&nbsp;©&nbsp;2012-2020&nbsp;&nbsp;ICP&nbsp;{{isset($config['information']->record)?$config['information']->record:""}}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset(__INDEX__)}}/res/layui/layui.js"></script>
<!--[if lt IE 9]>
<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
{{--@yield('pages')--}}
<script>
    layui.config({
        base: '{{asset(__INDEX__)}}/res/static/js/'
    }).use('firm');
</script>
</body>
</html>
