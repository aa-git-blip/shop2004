<?php

namespace App\Http\Controllers;
use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;
class AdminController extends Controller{
    //注册页面跳转
    function create(){
        return view("admin/create");
    }
    //注册添加
    function insert(Request $request){
        $validator = Validator::make($request->all(),[
            'user_name' => 'required|unique:admin',
            'password' => 'required',
            'email' => 'required',
        ],[
                'user_name.required'=>'用户名称必填',
                'user_name.unique'=>'用户已存在',
                'password.required'=>'密码必填',
                'email.required'=>'邮箱必填',
                
        ]);

        if($validator->fails()){
            return redirect('/create')
            ->withErrors($validator)
            ->withInput();
        }
        $data=$request->except('_token');
        $data['reg_time']=time();
        $res=DB::table('admin')->insert($data);
        if($res){
            return redirect('login');
        }
    }
    //登陆展示
    function index(){
        $res=DB::table('admin')->get();
        // dd($res);
        return view('admin.index',['res'=>$res]);
    }
    //注册删除
    function delete($id){
        $res=DB::table('admin')->where('uid',$id)->delete();
        return redirect('index');
    }
    //注册修改
    function edit($id){
        $res=DB::table('admin')->where('uid',$id)->first();
        return view('admin/edit',['res'=>$res]);
    }
    //注册修改
    function update(Request $request,$id){
        $data=$request->except('_token');
        //dd($data);
        $data['reg_time']=time();
        $res=DB::table('admin')->where('uid',$id)->update($data);
        return redirect('index');
    }
    //登录页面
    function login(){
        return view('admin/login');
    }
    //登录查询
    function logindo(Request $request){
        $user=$request->except('_token');
        // dump($user);
        
        $username=DB::table('admin')->where('user_name',$user['user_name'])->first();
        // dd($username);
        if(!$username){
            return redirect('/login')->with('msg','没有此用户');
        }
        if($username->password!=$user['password']){
            return redirect('/login')->with('msg','密码错误');
        }
        session('user',$username);
        $user['last_login']=time();
        // dd($user);
        DB::table('admin')->where('uid',$username->uid)->update($user);
        return redirect('index');
    }
}