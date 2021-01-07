@extends('admin.mainpage')
@section('title',"发展历程")
@section('content')
<div class="page-header">
    <h3 class="page-title">
      修改历程
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">单页管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">修改历程</li>
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
            <input type="hidden" name="type" value="3">
            <div class="form-group">
                <label for="title">发生时间</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ isset($page->title)?$page->title:"" }}" placeholder="请输入发生时间">
            </div>
            <div class="form-group">
              <label>图片上传</label>
              <input type="file" name="picture" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" value="{{ isset($page->picture)?$page->picture:"" }}" disabled="" placeholder="图片上传">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button>
                </span>
              </div>
            </div>
              <div class="form-group">
                <label for="contents">内容</label>
                <textarea class="form-control" id="contents" name="contents" rows="4" placeholder="请输入内容">{{ isset($page->contents)?$page->contents:"" }}</textarea>
                {{-- <script id="contents" name="contents" type="text/plain"></script> --}}
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
              <button class="btn btn-light">退出</button>
            </form>
          </div>
        </div>
      </div>
  </div>
  {{-- <script type="text/javascript" charset="utf-8" src="{{asset(__ADMIN__)}}/neditor/neditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="{{asset(__ADMIN__)}}/neditor/neditor.all.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="{{asset(__ADMIN__)}}/neditor/neditor.service.js"></script>
  <script>
    var ue = UE.getEditor('contents', {
      autoHeight: false,
      initialFrameHeight:300,
    });
  </script> --}}
@endsection
