@extends('admin.mainpage')
@section('title',"添加新闻")
@section('content')
<div class="page-header">
    <h3 class="page-title">
      新闻管理
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">新闻管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">添加新闻</li>
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
          <form class="forms-sample" action="{{route('admin.news.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="newstitle">新闻标题</label>
            <input type="text" class="form-control" id="newstitle" name="newstitle" placeholder="请输入新闻标题">
              </div>
              <div class="form-group">
                <label for="keyword">关键字</label>
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="请输入关键字">
              </div>
              <div class="form-group">
                <label for="desc">描述</label>
                <textarea class="form-control" id="desc" name="desc" rows="4" placeholder="请输入新闻描述"></textarea>
              </div>
              <div class="form-group">
                <label for="remark">摘要</label>
                <textarea class="form-control" id="remark" name="remark" rows="4" placeholder="请输入新闻摘要"></textarea>
              </div>
              <div class="form-group">
                <label for="read">浏览次数</label>
                <input type="text" class="form-control" id="read" name="read" value="0" placeholder="请输入浏览次数">
              </div>
              <div class="form-group">
                <label>图片上传</label>
                <input type="file" name="picture" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="图片上传">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                  <label for="alt">alt</label>
                  <textarea class="form-control" id="alt" name="alt" rows="4" placeholder="请输入图片关键字"></textarea>
              </div>
              <div class="form-group">
                <label for="contents">新闻内容</label>
                {{-- <textarea class="form-control" id="contents" name="contents" rows="4" placeholder="请输入新闻内容">{{isset($config['content'])?$config['content']:''}}</textarea> --}}
                <script id="contents" name="contents" type="text/plain"></script>
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
