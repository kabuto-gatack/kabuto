@extends('admin.mainpage')
@section('title',"Banner添加")
@section('content')
<div class="page-header">
    <h3 class="page-title">
      添加Banner
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Banner管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">添加Banner</li>
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
          <form class="forms-sample" action="{{route('admin.banner.store')}}" method="POST" enctype="multipart/form-data">
            @csrf  
            <div class="form-group">
                <label for="title">名称</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="请输入名称">
            </div>
            <div class="form-group">
              <label for="entitle">英文名称</label>
              <input type="text" class="form-control" id="entitle" name="entitle" placeholder="请输入英文名称">
          </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
              <button class="btn btn-light">退出</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection