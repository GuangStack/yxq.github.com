<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ContractController extends Controller
{
    //
    public function add()
    {
    	return view('admin.contract.add');
    }

    public function selectId(Request $request)
    {	
    	$id = $request -> input('id');
    	$data = DB::table('users') -> where('user_id', $id) -> first();
    	if($data)
    	{
    		// return response() -> json($data -> username);
    		// return responseText($data -> username);
    		return response() -> json($data -> username);
    	}else
    	{
    		return response() -> json('0');
    	}
    }

    public function selectHong(Request $request)
    {
    	$id = $request -> input('id');
    	$data = DB::table('hong') -> where('id', $id) -> first();
    	if($data)
    	{
    		return response() -> json($data);
    		// dd($data);
    	}else
    	{
    		return response() -> json('0');
    	}
    }

    public function insert(Request $request)
    {
    	// dd($request -> all());

    	$this -> validate($request,[
    		'user_id' => 'required',
    		'hong_id' => 'required',
    		],[
    		'user_id.required' => '客户编号不能为空',
    		'hong_id.required' => '红娘编号不能为空',
    		]);

    	$data = $request -> except('_token', 'hong_id');
    	// // dd($data);  用户名，红娘名，红娘电话
    	$datausername = DB::table('users') -> where('user_id', $request -> input('user_id')) -> first();
    	$data['name'] = $datausername -> username;
    	$hongname = DB::table('hong') -> where('id', $request -> input('hong_id')) -> first();
    	$data['hongname'] = $hongname -> name;
    	$data['hongphone'] = $hongname -> phone;
    	$data['time'] = time();
    	
    	$res = DB::table('contract') -> insert($data);
    	if($res)
    	{
    		// return 'sussful';
    		// dd(1111111111);
    		return redirect('/admin/contract/index') -> with(['info' => '添加成功']);
    	}else
    	{
    		return redirect('/admin/contract/add') -> with(['info' => '添加失败']);
    	}
    }

    public function index(Request $request)
    {
    	$data = DB::table('contract') -> get();
    	// dd($data);
    	return view('admin.contract.index',['data' => $data]);
    }

    public function edit($id)
    {
    	// return $id;
    	$data = DB::table('contract') -> where('id',$id) -> first();
    	// dd($data);

    	return view('admin.contract.edit',['data' => $data]);
    }

    public function update(Request $request)
    {
    	$this -> validate($request,[
    		'efficiency' => 'required',
    		],[
    		'efficiency.required' => '保证效率不能为空',
    		
    		]);
    	// dd( $request -> all());
    	// $res = DB::update('update contract set efficiency = '.$request -> input('efficiency').' where id = ?', [$request -> input('id')]);

    	$res = DB::table('contract') 
    		-> where('id', $request -> input('id'))
    		-> update(['efficiency' => $request -> input('efficiency')]);
    	if($res)
    	{
    		return redirect('/admin/contract/index') -> with(['info' => '更新成功']);
    	}else
    	{
        	return back() -> with(['info' => '更新失败']);
		
    	}
    }

    public function delete($id)
    {
    	// return $id;
    	$res = DB::table('contract') -> delete($id);
    	if($res)
    	{
    		return redirect('/admin/contract/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}
    }

}
