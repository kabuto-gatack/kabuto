<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//    return view('welcome');
// });

//前端模板导入
Route::name("index.")->group(function (){
    //首页
    Route::get("/","Index\IndexController@index")->name('home');
    //产品页面
    Route::get("/productlist","Index\ProductController@index")->name('product.list');
    Route::get("/productshow/{product}","Index\ProductController@show")->name('product.show');
    //新闻页面
    Route::get("/newslist","Index\NewsController@index")->name('news.list');
    Route::get("/newsshow/{news}","Index\NewsController@show")->name('news.show');
    //案例
    Route::get("/cases","Index\CasesController@index")->name('cases.index');
    //关于我们
    Route::get("/about","Index\PageController@index")->name('page.index');
});

//后台模板导入
Route::prefix("admin")->name("admin.")->middleware('auth')->group(function(){
    //用户界面
    Route::get("/manager","Admin\ManagerController@index")->name('manager.index');
    Route::get("/manager/{manager}/edit","Admin\ManagerController@edit")->name('manager.edit');
    Route::post("/manager/update/{manager}","Admin\ManagerController@update")->name('manager.update');
    Route::get("/manager/{manager}/delete","Admin\ManagerController@destroy")->name('manager.delete');
    //后台首页
    Route::get("/index","Admin\IndexController@index")->name("home");//控制器响应函数标识
    //系统配置
    Route::group(['prefix' => 'config'], function(){
        Route::get("/site","Admin\ConfigController@site")->name("config.site");
        Route::get("/information","Admin\ConfigController@information")->name("config.information");
        Route::get("/baidu","Admin\ConfigController@baidu")->name("config.baidu");
        Route::post("/store","Admin\ConfigController@store")->name("config.store");
    });
    //新闻
    Route::resource("/news","Admin\NewsController")->except("destroy");
    Route::get("/news/{news}/delete","Admin\NewsController@destroy")->name("news.delete");

    //富文本编辑器图片上传
    Route::post("/uploads","Admin\IndexController@imguploads")->name("uploads");

    //分类
    Route::group(['prefix' => 'category'],function(){
        Route::get("/","Admin\CategoryController@index")->name('category.index');
        Route::match(['get','post'],"/creates","Admin\CategoryController@create")->name('category.create');
        Route::match(['get','post'],"/{cate}/edit","Admin\CategoryController@edit")->name('category.edit');
        Route::get("/{cate}/delete","Admin\CategoryController@desotry")->name('category.delete');
    });

    //产品管理
    Route::resource("/product","Admin\ProductController");

    //案例管理
    Route::post("/cases/setsort","Admin\CasesController@setsort")->name('cases.setsort');
    Route::resource("/cases","Admin\CasesController");

    //单页模块
    Route::get("/page/recruit","Admin\PageController@recruit")->name('page.recruit');//招贤纳士中招聘的路由，必须放在资源路由前面
    Route::get("/page/course","Admin\PageController@course")->name('page.course');//发展历程列表界面
    Route::get("/page/history","Admin\PageController@history")->name('page.history');//发展历程添加界面
    Route::get("/page/{page}/hisedit","Admin\PageController@hisedit")->name('page.hisedit');//发展历程编辑界面
    Route::resource("/page","Admin\PageController");

    //banner模块
    Route::resource("/banner","Admin\BannerController");
    //轮播图列表模块
    Route::post("/banneritem/setsort","Admin\BanneritemController@setsort")->name("banneritem.setsort");
    Route::resource("/banneritem","Admin\BanneritemController");

    //友情链接模块
    Route::post("/friend/setsort","Admin\FriendController@setsort")->name("friend.setsort");
    Route::resource("/friend","Admin\FriendController");

});

//后台登录页面
Route::get("admin/login","Admin\LoginController@login")->name("admin.login");
Route::post("admin/store","Admin\LoginController@store")->name("admin.login.store");
Route::get("admin/logout","Admin\LoginController@logout")->name("admin.login.logout");
Route::get('admin/register',"Admin\LoginController@register")->name("admin.register");
Route::post('admin/register/store',"Admin\LoginController@register_store")->name('admin.register.store');
