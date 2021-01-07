@extends('admin.mainpage')
@section('title','Banner管理')
@section('content')
<div class="page-header">
    <h3 class="page-title">
      <a href="{{route('admin.banner.create')}}" class="btn btn-success btn-xs">添加Banner</a>
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Banner管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">Banner列表</li>
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
              <form action={} method="POST" id="myform">
                @csrf
                @method("DELETE")
              </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 80px;">ID</th>
                          <th>名称</th>
                          <th>英文名称</th>
                          <th class="text-center" style="width: 150px;">操作</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td class="text-center">{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{ $item->entitle }}</td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-xs" href="{{route('admin.banner.edit',['banner'=>$item->id])}}" role="button">编辑</a>
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
<script>
  function dosubmit(id){
    var src="/admin/banner/"+id;
    document.getElementById("myform").action = src;
    document.getElementById("myform").submit();
  }
</script>
@endsection
