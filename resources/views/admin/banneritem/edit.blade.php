@extends('admin.mainpage')
@section('title',"添加轮播图")
@section('content')
<div class="page-header">
    <h3 class="page-title">
      添加轮播图
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">轮播图管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">添加轮播图/</li>
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
          <form class="forms-sample" action="{{route('admin.banneritem.update',['id'=>$banneritem->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
              <label for="pid">所属Banner</label>
                <select class="form-control" id="banner_id" name="banner_id">
                  @foreach ($banners as $item)
                    <option value="{{$item->id}}" {{ ($item->id == $banneritem->banner_id)?"selected":""}}>{{$item->title}}</option>
                  @endforeach
                </select>
              </div>
            <div class="form-group">
                <label for="title">名称</label>
                <input type="text" class="form-control" value="{{ $banneritem->title }}" id="title" name="title" placeholder="请输入名称">
            </div>

              <div class="form-group">
                <label for="digest">摘要</label>
                <input type="text" class="form-control" value="{{ $banneritem->digest }}" id="digest" name="digest" placeholder="请输入摘要">
              </div>
              <div class="form-group">
                <label>图片上传</label>
                <input type="file" name="picture" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info"  value="{{ $banneritem->picture }}" disabled="" placeholder="图片上传">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                  <label for="alt">alt</label>
                  <textarea class="form-control" id="alt" name="alt" rows="4" placeholder="请输入图片关键字">{{$banneritem->alt}}</textarea>
              </div>
              <div class="form-group">
                <label for="sort">排序</label>
                <input type="text" class="form-control"  value="{{ $banneritem->sort }}" id="sort" name="sort" placeholder="请输入排序">
              </div>
              <div class="form-group">
                <label for="isshow">显示/隐藏</label>
                <div class="form-check form-check-success">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="isshow" value="1" {{ ($banneritem->isshow == '显示')?"checked":"" }}>
                      显示
                    <i class="input-helper"></i>
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
              <button class="btn btn-light">退出</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection
