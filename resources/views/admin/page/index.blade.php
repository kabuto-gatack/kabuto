@extends('admin.mainpage')
@section('title','招贤纳士')
@section('content')
<div class="page-header">
    <h3 class="page-title">
      <a href="{{route('admin.page.recruit')}}" class="btn btn-success btn-xs">添加职位</a>
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">单页管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">招贤纳士</li>
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
                  <form action="{{route('admin.page.destroy',['id' => 0])}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="批量删除" class="btn btn-danger btn-lg" style="margin-bottom: 10px;">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width:100px;">
                            <div class="form-check form-check-flat form-check-primary" style="margin: 0;">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="ischecked">
                                全选
                              </label>
                            </div>
                          </th>
                          <th class="text-center" style="width: 80px;">ID</th>
                          <th>职位</th>
                          <th class="text-center" style="width: 200px;">发布时间</th>
                          <th class="text-center" style="width: 150px;">操作</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>
                                  <div class="form-check form-check-flat form-check-primary" style="margin: auto; padding-bottom: 20px;">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input mychecked" name="ids[]" value="{{ $item->id }}">
                                    </label>
                                  </div>
                                </td>
                                <td class="text-center">{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td class="text-center">{{$item->created_at}}</td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-xs" href="{{route('admin.page.edit',['page'=>$item->id])}}" role="button">编辑</a>
                                    <a class="btn btn-danger btn-xs" href="javascript:;" onclick="dosubmit({{$item->id}})" role="button">删除</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </form>
                    <div class="pagination pagination-lg justify-content-center" style="padding:20px 0">{{ $list->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function dosubmit(id){
    var src="/admin/page/"+id;
    document.getElementById("myform").action = src;
    document.getElementById("myform").submit();
  }
</script>
@endsection
