@extends('admin.mainpage')
@section('title','轮播图管理')
@section('content')
<div class="page-header">
    <h3 class="page-title">
      <a href="{{route('admin.banneritem.create')}}" class="btn btn-success btn-xs">添加轮播图</a>
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">轮播图管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">轮播图列表</li>
      </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              @if (session()->has('data'))
                <div class="alert alert-{{session('data')['class']}}">
                    {{session('data')['msg']}}
                </div>
              @endif
              <form action="{}" method="POST" id="myform">
                @csrf
                    @method("DELETE")
              </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 80px;">ID</th>
                          <th>名称</th>
                          <th>所属分类</th>
                          <th class="text-center" style="width: 150px;">图片</th>
                          <th class="text-center" style="width: 100px;">排序</th>
                          <th class="text-center" style="width: 150px;">显示/隐藏</th>
                          <th class="text-center" style="width: 150px;">操作</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td class="text-center">{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{ isset($item->banners->title)?$item->banners->title:"" }}</td>
                                <td class="text-center"><img src="/uploads/{{ $item->picture }}" alt="{{$item->alt}}"></td>
                                <td class="text-center"><input type="text" class="setsort" data-id="{{ $item->id }}" value="{{ $item->sort }}" style="width: 50px;"></td>
                                <td class="text-center">{{ $item->isshow }}</td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-xs" href="{{route('admin.banneritem.edit',['banneritem'=>$item->id])}}" role="button">编辑</a>
                                    <a class="btn btn-danger btn-xs" href="javascript:;" onclick="dosubmit({{$item->id}})" role="button">删除</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script>
  function dosubmit(id){
    var src="/admin/banneritem/"+id;
    document.getElementById("myform").action = src;
    document.getElementById("myform").submit();
  }
  setsort();
  function setsort(){
      $(".setsort").on('change',function(){
          var sort = $(this).val();//获取排序的值
          var id = $(this).data("id");//获取需要排序的id值
          var _token = "{{ csrf_token() }}";//获取csrf保护

          $.post("{{ route('admin.banneritem.setsort') }}",{id:id,sort:sort,_token:_token},function(res){
              if (res.code == 1) {
                location.reload();//刷新页面
            }
          });
      });
  }
</script>
@endsection
