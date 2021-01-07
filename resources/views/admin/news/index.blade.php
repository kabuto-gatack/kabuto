@extends('admin.mainpage')
@section('title','新闻管理')
@section('content')
<div class="page-header">
    <h3 class="page-title">
      新闻管理
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">新闻管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">新闻列表</li>
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
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>新闻标题</th>
                          <th>浏览次数</th>
                          <th>照片</th>
                          <th>发布时间</th>
                          <th>操作</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->newstitle}}</td>
                                <td>{{$item->read}}</td>
                                <td><img src="{{"/uploads/$item->picture"}}" alt="{{$item->alt}}"></td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="{{route('admin.news.edit',['news' => $item->id])}}" role="button">编辑</a>
                                    <a class="btn btn-danger btn-xs" href="{{route('admin.news.delete',['news' => $item->id])}}" role="button">删除</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="pagination pagination-lg justify-content-center" style="padding:20px 0">{{ $list->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
