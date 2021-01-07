<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    //站点配置界面
    public function site(){
        $config = $this->getconfig("site");
        return view("admin.config.site")->with('config',$config);
    }

    //基本信息
    public function information(){
        $config = $this->getconfig("information");
        return view("admin.config.information")->with('config',$config);
    }

    //百度推送
    public function baidu(){
        $config = $this->getconfig("baidu");
        return view('admin.config.baidu')->with('config',$config);
    }
    //数据
    public function store(Request $request){
        $this->checkdate($request->name,$request);
        $data = $request->only('name','title');
        $data['config'] = json_encode($request->except('name','title','_token'));
        $data['created_at'] = date("Y/m/d H:i:s",time());
        $data['updated_at'] = date("Y/m/d H:i:s",time());
        $config = DB::table("config")->where('name','=',$request->name)->first();
        if($config){
            $result = DB::table("config")->where("name","=",$request->name)->update($data);
        }else{
            $result = DB::table("config")->insert($data);
        }

        if($result === true || $result > 0){
            session()->flash('data',['class' => 'success','msg' => '更新成功']);
        }else{
            session()->flash('data',['class' => 'danger','msg' => '更新失败']);
        }
        return redirect(route('admin.config.'.$request->name));
    }

    private function checkdate($name = 'site',$request){
        switch($name){
            case "site":
                $datavalidate = $request->validate([
                    'name' => 'required',
                    'title' => 'required',
                    'sitename' => 'required',
                    'sitedomain' => 'required|url'
                ],[
                    'name.required' => '配置标识不能为空',
                    'title.required' => '配置名称不能为空',
                    'sitename.required' => '网站名称不能为空',
                    'sitedomain.required' => '网站域名不能为空',
                    'sitedomain.url' => '网址输入不正确'
                ]);
                break;
            case "information":
                $datavalidate = $request->validate([
                    'name' => 'required',
                    'title' => 'required',
                    'company' => 'required',
                    'address' => 'required',
                    'hotline' => 'required',
                    'email' => 'required|email',
                ],[
                    'name.required' => '配置标识不能为空',
                    'title.required' => '配置名称不能为空',
                    'company.required' => '公司名称不能为空',
                    'address.required' => '公司地址不能为空',
                    'hotline.required' => '客服热线不能为空',
                    'email.required' => '邮箱不能为空',
                    'email.email' => '邮箱格式不对',
                ]);
                break;
            case "baidu":
                $datavalidate = $request->validate([
                    'name' => 'required',
                    'title' => 'required',
                    'key' => 'required'
                ],[
                    'name.required' => '配置标识不能为空',
                    'title.required' => '配置名称不能为空',
                    'key.required' => '百度密钥不能为空'
                ]);
        }
    }

    private function getconfig($name = "site"){
        $result = DB::table("config")->where("name","=",$name)->first();
        $config = [];
        if ($result) {
            $config = json_decode($result->config,true);
        }
        return $config;
    }
}
