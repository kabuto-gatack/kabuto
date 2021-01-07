<?php

namespace App\Http\Controllers\Admin;

use App\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    //
    public function index()
    {
        $list = Manager::get();
        return view('admin.manager.index')->with('list',$list);
    }

    public function edit(Manager $manager)
    {
        return view('admin.manager.password')->with('manager',$manager);
    }

    public function update(Request $request,Manager $manager)
    {
        if (\Hash::check($request->password,$manager->password)){

            session()->flash('data',['class' => 'danger','msg' => '新密码与原密码相同']);

        }else if ($request->username == \Auth::user()->username || (\Auth::user() -> active == 1 && $manager -> active != 1)){

            $this->validate($request,[
                'password' => 'required|min:6',
                'repassword' => 'required|min:6|same:password',
            ],[
                'password.required' => '密码不能为空',
                'repassword.required' => '密码不能为空',
                'password.min' => '密码长度不能小于6位',
                'repassword.min' => '密码长度不能小于6位',
                'repassword.same' => '两次密码不一致',
            ]);

            $Manager = Manager::find($manager->id);
            $Manager -> password = bcrypt($request->password);

            operation($Manager->save(),'修改');

        }else{
            session()->flash('data',['class' => 'danger','msg' => '非本用户或系统管理员无法修改密码']);
        }
        return redirect(route('admin.manager.index'));
    }

    public function destroy(Manager $manager)
    {
        if(\Auth::user()->active != 1){
            session()->flash('data',['class' => 'danger','msg' => '当前用户为普通用户，无法删除任何用户']);
        }else if ($manager->active == 1){
            session()->flash('data',['class' => 'danger','msg' => '系统默认用户无法删除']);
        }else{
            operation($manager->delete(),'删除');
        }
        return redirect(route('admin.manager.index'));
    }

}
