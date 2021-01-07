@extends('admin.mainpage')
@section('title',"职位信息")
@section('content')
<div class="page-header">
    <h3 class="page-title">
      职位信息
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">单页管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">职位信息</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                      <li>{{ $error }}</li>
                </div>
              @endforeach
            @endif
          <form class="forms-sample" action="{{route('admin.page.update',['id'=>$page->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" name="type" value="2">
            <div class="form-group">
                <label for="title">职位</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}" placeholder="请输入职位">
              </div>
              <div class="form-group">
                <label for="contents">职位要求</label>
                {{-- <textarea class="form-control" id="contents" name="contents" rows="4" placeholder="请输入新闻内容">{{isset($config['content'])?$config['content']:''}}</textarea> --}}
                <script id="contents" name="contents" type="text/plain">{!! $page->contents !!}</script>
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
              <button class="btn btn-light">退出</button>
            </form>
          </div>
        </div>
      </div>
  </div>
  <script type="text/javascript" charset="utf-8" src="{{asset(__ADMIN__)}}/neditor/neditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="{{asset(__ADMIN__)}}/neditor/neditor.all.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="{{asset(__ADMIN__)}}/neditor/neditor.service.js"></script>
  <script>
    var ue = UE.getEditor('contents', {
      autoHeight: false,
      initialFrameHeight:300,
    });
  </script>
@endsection
