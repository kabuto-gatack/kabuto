@extends('admin.mainpage')
@section('title','用户管理')
@section('content')
<div class="page-header">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">用户管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">用户列表</li>
      </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              @if (session()->has('data'))
                <div class="alert alert-{{session('data')['class']}}">
                    {{session('data')['msg']}}
                </div>
              @endif
              <form action={} method="POST" id="myform">
                @csrf
                @method("DELETE")
              </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 80px;">ID</th>
                          <th>用户名</th>
                          <th>邮箱</th>
                          <th class="text-center" style="width: 150px;">操作</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td class="text-center">{{$item->id}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{ $item->email }}</td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-xs" href="{{route('admin.manager.edit',['manager'=>$item->id])}}" role="button">修改密码</a>
                                    <a class="btn btn-danger btn-xs" href="{{route('admin.manager.delete',['manager'=>$item->id])}}" role="button">删除</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
