<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class JoinController extends Controller
{
    //
    public function add()
    {
    	return view('admin.join.add');
    }

    public function insert(Request $request)
    {
    	// dd($request -> all());
    		$this -> validate($request,[
    		'city' => 'required',
    		'name' => 'required',
    		'phone' => 'max:11|min:11',
    		'reason' => 'required',
    		],[
    		'name.required' => '姓名不能为空',
    		'city.required' => '城市不能为空',
    		'phone.max' => '手机号必须是11位的',
    		'phone.min' => '手机号必须是11位的',
    		'reason.required' => '请输入加盟原因',
    		]);
    	// dd($request -> all());
    	$data = $request -> except('_token');

    	$res = DB::table('join') -> insert($data);
    	if($res)
    	{
    		return redirect('admin/join/index') -> with(['info' => '添加成功']);
    	}else
    	{
    		return back() -> with(['info' => '添加失败']);
    	}
    }

    public function index(Request $request)
    {
    	$data = DB::table('join') -> get();
    	// dd($data);
    	// dd(222222222222222222222222);

    	return view('admin.join.index',['data' => $data]);
    }

    public function edit($id)
    {
    	// return $id;
    	$data = DB::table('join') -> where('id',$id) -> first();
    	// dd($data);

    	return view('admin.join.edit',['data' => $data]);
    }

    public function update(Request $request)
    {
    	$id = $request -> input('id');
    	
    	$data = $request -> except('_token','id');
    	// dd($data);

    	$res = DB::table('join') -> where('id',$id) -> update($data);
    	if($res)
    	{
    		return redirect('admin/join/index') -> with(['info' => '更新成功']);
    	}else
    	{
    		return back() -> with(['info' => '失败更新']);
    	}
  }

    public function delete($id)
    {
    	// return $id;
    	$res = DB::table('join') -> delete($id);
    	if($res)
    	{
    		return redirect('/admin/join/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}
    }

}
