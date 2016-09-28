<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class EmotionalController extends Controller
{
    //add
    public function index()
    {
    	//查询数据库
    	$data = DB::table('emotional AS e')
    		->select('u.username','e.title','e.type','e.time','e.user_id','e.id')
    		->leftJoin('users AS u','u.user_id','=','e.user_id')
    		->get();
    	
    	return view('admin.emotional.index',['data' => $data]);
    }

    //edit
    public function edit($id)
    {
    	$data = DB::table('emotional') -> where('id',$id) -> first();
    	return view('admin.emotional.edit',['data' => $data]);
    }

    //更新
    public function update(Request $request)
    {
    	//验证传送过来的东西是否为空
    	$this -> validate($request,[
    		'title' => 'required',
    		'content' => 'required'
    		
    		],[
    		'title.required' => '标题不能为空',
    		'content.required' => '内容不能为空',
    		
    		]);
    	//处理数据
    	$data = $request -> except('_token');
    	//dd($data);
    	$data['content'] = strip_tags($request -> content);
    	//执行添加
    	$res = DB::table('emotional')  -> where('id',$data['id']) -> update($data);

    	if($res)
    	{
    		return redirect('/admin/emotional/index') -> with(['info' => '修改成功']);
    	}else
    	{
    		return back() -> with(['info'  => '修改失败']);
    	}
    }

    //删除
    public function delete($id)
    {
    	//执行删除操作
    	$res = DB::table('emotional') -> delete($id);

    	//判断结果
    	if($res)
    	{
    		return redirect('/admin/emotional/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}
    }
}
