@extends('index.mainpage')
@section('title','新闻列表')
@section('news','layui-this')
@section('content')
    <!-- banner部分 -->
    @if(!empty($banner))
        <div class="banner news" style="background: url('/uploads/{{$banner->picture}}') no-repeat center top;">
            <div class="title">
                <p>{{isset($banner->title)?$banner->title:""}}</p>
                <p class="en">{{isset($banner->digest)?$banner->digest:""}}</p>
            </div>
        </div>
    @endif
    <!-- main -->
    <div class="main-news">
        <div class="layui-container">
            <div class="layui-row layui-col-space20">
                @foreach($list as $value)
                    <div class="layui-col-lg6 content">
                        <div>
                            <div class="news-img"><a href=""><img src="/uploads/{{$value->picture}}" alt="{{$value->alt}}"></a></div><div class="news-panel">
                                <strong><a href="{{route('index.news.show',['news' => $value->id])}}">{{$value->newstitle}}</a></strong>
                                <p class="detail"><span>{{$value->remark}}</span><a href="{{route('index.news.show',['news' => $value->id])}}">[详细]</a></p>
                                <p class="read-push">阅读 <span>{{$value->read}}</span>&nbsp;&nbsp;&nbsp;&nbsp;发布时间：<span>{{$value->created_at}}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

{{--            <div id="newsPage"></div>--}}{{--利用下方的js代码实现layui的分页显示--}}
            <div id="newsPage">{{ $list->links('vendor.pagination.default') }}</div>{{--利用laravel的分页来实现layui的分页显示--}}
        </div>
    </div>
@endsection
{{--@section('pages')--}}
{{--        <script>--}}
{{--            layui.use('laypage', function(){--}}
{{--                var laypage = layui.laypage;--}}

{{--                //执行一个laypage实例--}}
{{--                laypage.render({--}}
{{--                    elem: 'newsPage' //注意，这里的 test1 是 ID，不用加 # 号--}}
{{--                    ,count: {{$list->total()}} //数据总数，从服务端得到--}}
{{--                    ,curr: {{$list->currentPage()}}--}}
{{--                    ,jump: function(obj, first){--}}
{{--                        //obj包含了当前分页的所有参数，比如：--}}
{{--                        // console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。--}}
{{--                        // console.log(obj.limit); //得到每页显示的条数--}}
{{--                        //首次不执行--}}
{{--                        if(!first){--}}
{{--                            //do something--}}
{{--                            location.href = "?page=" + obj.curr;--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
{{--@endsection--}}
