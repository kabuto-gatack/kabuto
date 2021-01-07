<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>后台登录</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset(__ADMIN__) }}/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{ asset(__ADMIN__) }}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset(__ADMIN__) }}/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset(__ADMIN__) }}/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="{{ asset(__ADMIN__) }}/images/logo.jpg">
              </div>
              <h4>后台登录</h4>
                @if (session()->has('data'))
                    <div class="alert alert-{{session('data')['class']}}">
                        {{session('data')['msg']}}
                    </div>
                @endif
              @if(session()->has('errormsg'))
              <div class="alert alert-danger">
                  {{session('errormsg')}}
              </div>
              @endif
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            <li>{{ $error }}</li>
                        </div>
                    @endforeach
                @endif
              <form class="pt-3" action="{{ route('admin.login.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="请输入用户名">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="请输入密码">
                </div>
                <div class="form-group">
                    <input type="text" name="code" class="form-control form-control-lg" id="exampleInputCaptcha" placeholder="请输入验证码"  style="width: 65%; float:left; margin-right: 30px;" >
                    <span style="cursor: pointer;font-size: 12px; width: 120px; display: inline-block; padding-left: 5px;" onclick="$(this).find('img').attr('src','{{captcha_src()}}?'+Math.random())"><img src="{{captcha_src()}}" alt="" style="margin-right: 10px;">
{{--                    this.src = '{{captcha_src()}}?'+Math.random()--}}
                    看不清，点一下图片</span>
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="登录">
                </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                      <div class="form-check">
                          <label class="form-check-label text-muted">
                              <input type="checkbox" class="form-check-input" name="logged">
                              保持登录状态
                              <i class="input-helper"></i></label>
                      </div>
                      <a href="#" class="auth-link text-black">忘记密码？</a>
                  </div><div class="text-center mt-4 font-weight-light">
                      还没有帐号 ？<a href="{{ route('admin.register') }}" class="text-primary">创建</a>
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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset(__ADMIN__) }}/vendors/js/vendor.bundle.base.js"></script>
  <script src="{{ asset(__ADMIN__) }}/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset(__ADMIN__) }}/js/off-canvas.js"></script>
  <script src="{{ asset(__ADMIN__) }}/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
