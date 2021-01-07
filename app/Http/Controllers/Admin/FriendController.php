<?php

namespace App\Http\Controllers\Admin;

use App\Banneritem;
use App\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFriend;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Friend::OrderBy('sort','Desc')->OrderBy('id')->get();

        return view('admin.friend.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.friend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFriend $request)
    {
        //
        $FriendModel = new Friend();
        $FriendModel->title = $request->title;
        $FriendModel->url = $request->url;
        $FriendModel->sort = $request->sort;
        $FriendModel->key = $request->key;
        operation($FriendModel->save(),'添加');
        return redirect(route('admin.friend.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
        return view('admin.friend.edit')->with('friend',$friend);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $FriendModel = Friend::find($id);
        $FriendModel->title = $request->title;
        $FriendModel->url = $request->url;
        $FriendModel->sort = $request->sort;
        $FriendModel->key = $request->key;
        operation($FriendModel->save(),'修改');
        return redirect(route('admin.friend.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
        operation($friend->delete(),'删除');
        return redirect(route('admin.friend.index'));
    }

    //排序
    public function setsort(Request $request){
        //
        if ($request->isMethod("POST")) {
            $FriendModel = Friend::find($request->id);
            $FriendModel->sort = $request->sort;
            $result = $FriendModel->save();
        }
        if ($result>0) {
            return ['code' => 1,'msg' => '操作成功'];
        }else{
            return ['code' => 0,'msg' => '操作失败'];
        }
    }
}
