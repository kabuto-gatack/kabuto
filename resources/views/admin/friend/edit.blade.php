@extends('admin.mainpage')
@section('title',"编辑友情链接")
@section('content')
<div class="page-header">
    <h3 class="page-title">
      编辑友情链接
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">友情链接管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">编辑友情链接/</li>
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
            @if (session()->has("errormsg"))
              <div class="alert alert-danger">
                {{ session("errormsg") }}
              </div>
            @endif
         <form class="forms-sample" action="{{route('admin.friend.update',['id' => $friend->id])}}" method="POST" enctype="multipart/form-data">
            @csrf  
            <div class="form-group">
                <label for="title">名称</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $friend->title }}" placeholder="请输入名称">
            </div>
            <div class="form-group">
              <label for="url">网址</label>
              <input type="text" class="form-control" id="url" name="url" value="{{ $friend->url }}" placeholder="请输入网址">
            </div>
            <div class="form-group">
              <label for="sort">排序</label>
              <input type="text" class="form-control" id="sort" name="sort" value="{{ $friend->sort }}" placeholder="请输入排序">
            </div>
            <div class="form-group">
              <label for="key">关键字</label>
              <input type="text" class="form-control" id="key" name="key" value="{{ $friend->key }}" placeholder="请输入关键字">
            </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
              <a class="btn btn-light" href="{{ route('admin.friend.index') }}">退出</a>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection