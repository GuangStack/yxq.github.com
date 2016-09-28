<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class RechargeController extends Controller
{
    //
    public function add()
    {
    	return view('admin.recharge.add');
    }

    public function insert(Request $request)
    {
    	$this -> validate($request,[
    		'user_id' => 'required',
    		'money' => 'required',
    		],[
    		'user_id.required' => '用户编号不能为空',
    		'money.required' => '充值金额不能为空',
    		]);
    	// dd($request -> all());
    	$data = $request -> except('_token');
    	$data['time'] = time();
    	$res = DB::table('recharge') -> insert($data);
    	if($res)
    	{
    		return redirect('admin/recharge/index') -> with(['info' => '添加成功']);
    	}else
    	{
    		return back() -> with(['info' => '添加失败']);
    	}
    }

    public function getUser(Request $request)
    {
    	// dd(555);
    	$id = $request -> input('id');
    	$data = DB::table('users') -> where('user_id', $id) -> first();
    	if(!$data)
    	{
    		// return response() -> json($data -> username);
    		// return responseText($data -> username);
    		return response() -> json('0');
    	}
    }

    public function index()
    {
    	$data = DB::table('recharge') -> get();
    	// dd($data);
    	return view('admin.recharge.index',['data' => $data]);
    }

    public function edit($id)
    {
    	$data = DB::table('recharge') -> where('id',$id) -> first();
    	// dd($data);
    	return view('admin.recharge.edit',['data' => $data]);
    }

    public function update(Request $request)
    {
    	$this -> validate($request,[
    		'money' => 'required',
    		],[
    		'money.required' => '金额不能为空',
    		]);
    	// dd($request -> all());
    	$id = $request -> input('id');
    		
    	$data = $request -> except('_token','id');
    	
    	$res = DB::table('recharge') -> where('id',$id) -> update($data);
    	if($res)
    	{
    		return redirect('admin/recharge/index') -> with(['info' => '更新成功']);
    	}else
    	{
    		return back() -> with(['info' => '更新失败']);
    	}
    }

    public function delete($id)
    {
    	$res = DB::table('recharge') -> delete($id);
    	if($res)
    	{
    		return redirect('/admin/recharge/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}
    }
}
