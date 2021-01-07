@extends('admin.mainpage')
@section('title',"基本信息")
@section('content')
<div class="page-header">
    <h3 class="page-title">
      基本信息
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">系统配置</a></li>
        <li class="breadcrumb-item active" aria-current="page">基本信息</li>
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
                <div class="alert alert-{{session('data')['class']}}">
                    {{session('data')['msg']}}
                </div>
            @endif
          <form class="forms-sample" action="{{route('admin.config.store')}}" method="POST">
            @csrf
            <input type="hidden" name="name" value="information">
            <input type="hidden" name="title" value="基本信息配置">
            <div class="form-group">
                <label for="company">公司</label>
            <input type="text" class="form-control" id="company" name="company" value="{{isset($config['company'])?$config['company']:''}}" placeholder="请输入公司名称">
              </div>
              <div class="form-group">
                <label for="address">地址</label>
                <input type="text" class="form-control" id="address" name="address" value="{{isset($config['address'])?$config['address']:''}}" placeholder="请输入公司地址">
              </div>
              <div class="form-group">
                <label for="hotline">客服热线</label>
                <input type="text" class="form-control" id="hotline" name="hotline" value="{{isset($config['hotline'])?$config['hotline']:''}}" placeholder="请输入客服热线">
              </div>
              <div class="form-group">
                  <label for="email">邮箱</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{isset($config['email'])?$config['email']:''}}" placeholder="请输入邮箱">
              </div>
              <div class="form-group">
                <label for="record">备案号</label>
                <input type="text" class="form-control" id="record" name="record" value="{{isset($config['record'])?$config['record']:''}}" placeholder="请输入备案号">
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
              <button class="btn btn-light">退出</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection
