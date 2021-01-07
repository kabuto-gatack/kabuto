@extends('admin.mainpage')
@section('title',"添加案例")
@section('content')
<div class="page-header">
    <h3 class="page-title">
      <a href="{{route('admin.cases.index')}}" class="btn btn-success btn-xs">返回案例列表</a>
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">案例管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">添加案例</li>
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
          <form class="forms-sample" action="{{route('admin.cases.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">案例标题</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="请输入案例标题">
            </div>
              <div class="form-group">
                <label for="remark">摘要</label>
                <textarea class="form-control" id="remark" name="remark" rows="4" placeholder="请输入摘要"></textarea>
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
                <label for="sort">排序</label>
                <input type="text" class="form-control" id="sort" name="sort" placeholder="请输入排序号"  value="100">
            </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
              <button class="btn btn-light">退出</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection
