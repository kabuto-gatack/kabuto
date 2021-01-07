@extends('admin.mainpage')
@section('title','案例管理')
@section('content')
<div class="page-header">
    <h3 class="page-title">
      <a href="{{route('admin.cases.create')}}" class="btn btn-success btn-xs">添加案例</a>
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">案例管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">案例列表</li>
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
                  <form action="{{route('admin.cases.destroy',['id' => 0])}}" method="POST">
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
                          <th>案例标题</th>
                          <th class="text-center" style="width: 100px;">图片</th>
                          <th class="text-center" style="width: 100px;">排序</th>
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
                                <td class="text-center"><img src="{{"/uploads/$item->picture"}}" alt="{{$item->alt}}"></td>
                                <td class="text-center"><input type="text" class="setsort" data-id="{{ $item->id }}" value="{{ $item->sort }}" style="width: 50px;"></td>
                                <td class="text-center">{{$item->created_at}}</td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-xs" href="{{route('admin.cases.edit',['case' => $item->id])}}" role="button">编辑</a>
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
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script>
  function dosubmit(id){
    var src="/admin/cases/"+id;
    document.getElementById("myform").action = src;
    document.getElementById("myform").submit();
  }
  setsort();
  function setsort(){
      $(".setsort").on('change',function(){
          var sort = $(this).val();//获取排序的值
          var id = $(this).data("id");//获取需要排序的id值
          var _token = "{{ csrf_token() }}";//获取csrf保护

          $.post("{{ route('admin.cases.setsort') }}",{id:id,sort:sort,_token:_token},function(res){
              if (res.code == 1) {
                  location.reload();//刷新页面
              }
          });
      });
  }
</script>
@endsection
