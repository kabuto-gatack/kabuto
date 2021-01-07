@extends('index.mainpage')
@section('title',"产品列表")
@section('product','layui-this')
@section('content')
  <!-- banner部分 -->
  @if(!empty($banner))
  <div class="banner product" style="background: url('/uploads/{{$banner->picture}}') no-repeat center top;">
    <div class="title">
      <p>{{isset($banner->title)?$banner->title:""}}</p>
      <p class="en">{{isset($banner->digest)?$banner->digest:""}}</p>
    </div>
  </div>
  @endif
  <!-- main部分 -->
  <div class="main product">
    <div class="layui-container">
      @foreach($list as $value)
      <div class="content layui-row">
        <div class="layui-col-xs12 layui-col-sm6 layui-col-md7 layui-col-lg6 content-img"><img src="/uploads/{{$value->picture}}" alt="{{$value->alt}}"></div>
        <div class="layui-col-xs12 layui-col-sm6 layui-col-md5 layui-col-lg6 right">
          <p class="label">{{$value->productname}}</p>
          <p class="detail">{{$value->desc}}</p>
          <div><a href="{{route('index.product.show',['product' => $value->id])}}">查看产品 ></a></div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection
