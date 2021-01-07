@extends('admin.mainpage')
@section('title',"公司简介")
@section('content')
<div class="page-header">
    <h3 class="page-title">
      公司简介
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">单页管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">公司简介</li>
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
            @if (session()->has('data'))
                <div class="alert alert-{{ session('data')['class'] }}">
                  {{ session('data')['msg'] }}
                </div>
            @endif
          <form class="forms-sample" action="{{route('admin.page.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" value="1">
            <div class="form-group">
                <label for="title">标题</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ isset($brief->title)?$brief->title:'' }}" placeholder="请输入标题">
              </div>
              <div class="form-group">
                <label>图片上传</label>
                <input type="file" name="picture" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" value="{{ isset($brief->picture)?$brief->picture:'' }}" placeholder="图片上传">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="contents">详情</label>
                {{-- <textarea class="form-control" id="contents" name="contents" rows="4" placeholder="请输入新闻内容">{{isset($config['content'])?$config['content']:''}}</textarea> --}}
                <script id="contents" name="contents" type="text/plain">{!! isset($brief->contents)?$brief->contents:'' !!}</script>
              </div>
              <div class="form-group">
                  <label>图片上传</label>
                  <input type="file" name="picture1" class="file-upload-default">
                  <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled="" value="{{ isset($brief->picture1)?$brief->picture1:'' }}" placeholder="图片上传">
                      <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button>
                  </span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="contents1">详情</label>
                  {{-- <textarea class="form-control" id="contents" name="contents" rows="4" placeholder="请输入新闻内容">{{isset($config['content'])?$config['content']:''}}</textarea> --}}
                  <script id="contents1" name="contents1" type="text/plain">{!! isset($brief->contents1)?$brief->contents1:'' !!}</script>
              </div>
              <div class="form-group">
                  <label>图片上传</label>
                  <input type="file" name="picture2" class="file-upload-default">
                  <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled="" value="{{ isset($brief->picture2)?$brief->picture2:'' }}" placeholder="图片上传">
                      <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button>
                  </span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="contents">详情</label>
                  {{-- <textarea class="form-control" id="contents" name="contents" rows="4" placeholder="请输入新闻内容">{{isset($config['content'])?$config['content']:''}}</textarea> --}}
                  <script id="contents2" name="contents2" type="text/plain">{!! isset($brief->contents2)?$brief->contents2:'' !!}</script>
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
    var ue = UE.getEditor('contents1', {
        autoHeight: false,
        initialFrameHeight:300,
    });
    var ue = UE.getEditor('contents2', {
        autoHeight: false,
        initialFrameHeight:300,
    });
  </script>
@endsection
