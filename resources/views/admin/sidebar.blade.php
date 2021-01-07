<li class="nav-item nav-profile">
    <a href="#" class="nav-link">
      <div class="nav-profile-image">
        <img src="{{asset(__ADMIN__)}}/images/Spirit/Spirit1.jpg" alt="profile">
        <span class="login-status online"></span> <!--change to offline or busy as needed-->
      </div>
      <div class="nav-profile-text d-flex flex-column">
        <span class="font-weight-bold mb-2">{{ auth()->guard('admin')->user()->username }}</span>
        <span class="text-secondary text-small">Water Prince</span>
      </div>
      <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
    </a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="{{route('admin.home')}}">
      <span class="menu-title">信息</span>
      <i class="mdi mdi-home menu-icon"></i>
    </a>
  </li>
<li class="nav-item">
    <a class="nav-link" href="{{route('admin.manager.index')}}">
        <span class="menu-title">用户管理</span>
        <i class="mdi mdi-account menu-icon"></i>
    </a>
</li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-config" aria-expanded="false" aria-controls="ui-config">
      <span class="menu-title">系统配置</span>
      <i class="menu-arrow"></i>
      <i class="mdi mdi-crosshairs-gps menu-icon"></i>
    </a>
    <div class="collapse" id="ui-config">
      <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="{{route('admin.config.site')}}">网络配置</a></li>
      <li class="nav-item"> <a class="nav-link" href="{{route('admin.config.information')}}">基本信息</a></li>
      <li class="nav-item"> <a class="nav-link" href="{{route('admin.config.baidu')}}">百度推送</a></li>
      </ul>
    </div>
  </li>
  {{-- 左边列表 --}}
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-news" aria-expanded="false" aria-controls="ui-news">
      <span class="menu-title">新闻管理</span>
      <i class="menu-arrow"></i>
      <i class="mdi mdi-recycle menu-icon"></i>
    </a>
    <div class="collapse" id="ui-news">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{route('admin.news.index')}}">新闻列表</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{route('admin.news.create')}}">添加新闻</a></li>
      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-product" aria-expanded="false" aria-controls="ui-product">
      <span class="menu-title">产品管理</span>
      <i class="menu-arrow"></i>
      <i class="mdi mdi-book-open-page-variant menu-icon"></i>
    </a>
    <div class="collapse" id="ui-product">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{route('admin.product.index')}}">产品列表</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{route('admin.category.index')}}">产品分类</a></li>
      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('admin.cases.index')}}">
      <span class="menu-title">案例管理</span>
      <i class="mdi mdi-cube-send menu-icon"></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-pages" aria-expanded="false" aria-controls="ui-pages">
      <span class="menu-title">单页管理</span>
      <i class="menu-arrow"></i>
      <i class="mdi mdi-medical-bag menu-icon"></i>
    </a>
    <div class="collapse" id="ui-pages">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.page.create') }}">公司简介</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.page.index') }}">招贤纳士</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.page.course') }}">发展历程</a></li>
      </ul>
      </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-banner" aria-expanded="false" aria-controls="ui-banner">
      <span class="menu-title">banner管理</span>
      <i class="menu-arrow"></i>
      <i class="mdi mdi-view-array menu-icon"></i>
    </a>
    <div class="collapse" id="ui-banner">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.banner.index') }}">轮播图分类</a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.banneritem.index') }}">轮播图列表</a></li>
      </ul>
      </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('admin.friend.index')}}">
      <span class="menu-title">友情链接</span>
      <i class="mdi mdi-cube-send menu-icon"></i>
    </a>
  </li>
  <li class="nav-item sidebar-actions">
    <span class="nav-link">
      <div class="border-bottom">
        <h6 class="font-weight-normal mb-3">Projects</h6>
      </div>
      <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
      <div class="mt-4">
        <div class="border-bottom">
          <p class="text-secondary">Categories</p>
        </div>
        <ul class="gradient-bullet-list mt-4">
          <li>Free</li>
          <li>Pro</li>
        </ul>
      </div>
    </span>
  </li>
