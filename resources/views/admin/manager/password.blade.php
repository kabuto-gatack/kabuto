@extends('admin.mainpage')
@section('title',"Banner修改")
@section('content')
      <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                  <div class="brand-logo">
                      <img src="{{ asset(__ADMIN__) }}/images/logo.jpg">
                  </div>
                  <h4>修改密码</h4>
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <li>{{ $error }}</li>
                            </div>
                        @endforeach
                    @endif
                  <form class="pt-3" action="{{ route('admin.manager.update',['manager'=>$manager->id]) }}" method="POST">
                      @csrf
                      <div class="form-group">
                          <label for="title">用户名：{{ $manager->username }}</label>
                      </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="请输入密码">
                    </div>
                    <div class="form-group">
                       <input type="password" name="repassword" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="请再次输入密码">
                    </div>
                      <div class="mt-3">
                          <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="修改">
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
@endsection


{{--@endsection--}}
