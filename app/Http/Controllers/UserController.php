<?php

namespace App\Http\Controllers;
use App\UserModel;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    //添加展示试图
    public function create(){
        return view('user/create');
    }
    //添加方式
    public function store(Request $request){
        $data=$request->except('_token');
        //dump($data);
        $res=UserModel::insert($data);
        if($res){
            return redirect('index');
        }
    }
    //展示方法
    public function index(){
        $res=UserModel::all();
        return view('user.index',['res'=>$res]);
    }
    //删除方法
    public function delete($id){
        //dd(11);
        $res=UserModel::destroy($id);
        return redirect('index');
    }
    //修改查询一条
    public function edit($id){
        $res=UserModel::find($id);
        return view('user/edit',['res'=>$res]);
    }
    //修改方法
    public function update(Request $request,$id){
        //dd(111);
        $data=$request->except('_token');
        //dump($data);
        $res=UserModel::where('user_id',$id)->update($data);
        if($res){
            return redirect('/index');
        }
    }
}
