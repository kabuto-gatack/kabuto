@extends('admin.mainpage')
@section('title',"网络配置")
@section('content')
<div class="page-header">
    <h3 class="page-title">
      系统配置
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">系统配置</a></li>
        <li class="breadcrumb-item active" aria-current="page">网络配置</li>
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
            <input type="hidden" name="name" value="site">
            <input type="hidden" name="title" value="站点配置">
            <div class="form-group">
                <label for="sitename">网站名称</label>
            <input type="text" class="form-control" id="stiename" name="sitename" value="{{isset($config['sitename'])?$config['sitename']:''}}" placeholder="请输入网站名称">
              </div>
              <div class="form-group">
                <label for="sitedomain">网站域名</label>
                <input type="text" class="form-control" id="sitedomain" name="sitedomain" value="{{isset($config['sitedomain'])?$config['sitedomain']:''}}" placeholder="请输入网站域名">
              </div>
              <div class="form-group">
                <label for="sitekeywords">网站关键字</label>
                <input type="text" class="form-control" id="sitekeywords" name="sitekeywords" value="{{isset($config['sitekeywords'])?$config['sitekeywords']:''}}" placeholder="请输入网站关键字">
              </div>
              <div class="form-group">
                <label for="sitedesc">网站描述</label>
                <textarea class="form-control" id="sitedesc" name="sitedesc" rows="4" placeholder="请输入网站描述">{{isset($config['sitedesc'])?$config['sitedesc']:''}}</textarea>
              </div>
              <div class="form-group">
                <label class="col-form-label">运行状态</label>
                <div class="row">
                    <div class="col-sm-4 col-md-2 col-lg-1">
                        <div class="form-check">
                          <label class="form-check-label">
                            @if (isset($config['status']))
                              <input type="radio" class="form-check-input" name="status" id="status" value="1" {{($config['status']==1)?'checked':''}}>
                            @else
                              <input type="radio" class="form-check-input" name="status" id="status" value="1" checked=""> 
                            @endif
                            开启
                          <i class="input-helper"></i></label>
                        </div>
                      </div>
                      <div class="col-sm-4 col-md-2 col-lg-1">
                        <div class="form-check">
                          <label class="form-check-label">
                            @if (isset($config['status']))
                              <input type="radio" class="form-check-input" name="status" id="status" value="2" {{($config['status']==2)?'checked':''}}>
                            @else
                              <input type="radio" class="form-check-input" name="status" id="status" value="2"> 
                            @endif
                            关闭
                          <i class="input-helper"></i></label>
                        </div>
                      </div>
                </div>
              </div>
              <div class="form-group">
                <label for="closeinfo">关站提示</label>
                <textarea class="form-control" id="closeinfo" name="closeinfo" rows="4" placeholder="请输入关站提示">{{isset($config['closeinfo'])?$config['closeinfo']:''}}</textarea>
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
              <button class="btn btn-light">退出</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection