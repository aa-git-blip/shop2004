<?php

namespace App\Http\Controllers;
use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller{
    function create(){
        return view("admin/create");
    }
    function insert(Request $request){
        $data=$request->except('_token');
        $data['reg_time']=time();
        $res=DB::table('admin')->insert($data);
        if($res){
            return redirect('index');
        }
    }
    function index(){
        $res=DB::table('admin')->get();
        // dd($res);
        return view('admin.index',['res'=>$res]);
    }
    function delete($id){
        $res=DB::table('admin')->where('uid',$id)->delete();
        return redirect('index');
    }
    function edit($id){
        $res=DB::table('admin')->where('uid',$id)->first();
        return view('admin/edit',['res'=>$res]);
    }
    function update(Request $request,$id){
        $data=$request->except('_token');
        //dd($data);
        $data['reg_time']=time();
        $res=DB::table('admin')->where('uid',$id)->update($data);
        return redirect('index');
    }
}