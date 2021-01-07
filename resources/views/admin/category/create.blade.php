@extends('admin.mainpage')
@section('title',"产品管理")
@section('content')
  <div class="page-header">
    <h3 class="page-title">
      产品分类
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">产品管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">添加分类</li>
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
          <form class="forms-sample" action="?" method="post">
            @csrf  
            <div class="form-group">
              <label for="pid">上级分类</label>
                <select class="form-control" id="pid" name="pid">
                  <option value="0">顶级分类</option>
                  @foreach ($cates as $item)
                    <option value="{{$item->id}}">{{($item->level == 0)?"":"|"}}{{str_repeat("-----",$item->level)}}{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
            <div class="form-group">
              <label for="name">分类名称</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="请输入分类名称">
            </div>
            <div class="form-group">
              <label for="store">排序</label>
              <input type="text" class="form-control" id="store" name="store" value="100" placeholder="请输入排序">
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">保存</button>
            <button class="btn btn-light">退出</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection