<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>后台用户注册</title>
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
              <h4>注册界面</h4>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            <li>{{ $error }}</li>
                        </div>
                    @endforeach
                @endif
              <form class="pt-3" action="{{ route('admin.register.store') }}" method="POST">
                  @csrf
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="请输入用户名">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="请输入邮箱">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="请输入密码">
                </div>
                <div class="form-group">
                   <input type="password" name="repassword" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="请再次输入密码">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" name="service" checked>
                        我同意所有条款和条件
                    </label>
                  </div>
                </div>
                  <div class="mt-3">
                      <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="注册">
                  </div>
                <div class="text-center mt-4 font-weight-light">
                    已经有帐号了？ <a href="{{ route('admin.login') }}" class="text-primary"> 登录 </a>
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
