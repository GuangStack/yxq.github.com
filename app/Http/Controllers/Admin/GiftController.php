<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GiftController extends Controller
{
    //
    public function add()
    {
    	return view('admin.gift.add');
    }

    public function insert(Request $request)
    {
    	$this -> validate($request,[
    		'name' => 'required',
    		'img' => 'required',
    		],[
    		'name.required' => '礼物名不能为空',
    		'img.required' => '请上传图片',
    		]);
    	// dd($request -> all());
    	$data = $request -> except('_token');

    	if($request -> hasFile('img'))
    	{
    		// dd($data);
    		if($request -> file('img') -> isValid())
    		{
    			$suffix = $request -> file('img') -> getClientOriginalExtension();
    			// echo $suffix;
    			$fileName = time().mt_rand(1,999999).'.'.$suffix;
    			$request -> file('img') -> move('./uploads',$fileName);
    			$data['img'] = '/uploads/'.$fileName;
    		}
    	}

    	$res = DB::table('vgift') -> insert($data);
    	if($res)
    	{
    		return redirect('admin/gift/index') -> with(['info' => '添加成功']);
    	}else
    	{
    		return back() -> with(['info' => '添加失败']);
    	}
    }

    public function index()
    {
    	$data = DB::table('vgift') -> get();
    	return view('admin.gift.index',['data' => $data]);
    }

    public function edit($id)
    {
    	$data = DB::table('vgift') -> where('id',$id) -> first();
    	return view('admin.gift.edit',['data' => $data]);
    }

    public function update(Request $request)
    {
    	$this -> validate($request,[
    		'name' => 'required',
    		'img' => 'required',
    		],[
    		'name.required' => '礼物名不能为空',
    		'img.required' => '请上传图片',
    		]);
    	$id = $request -> input('id');
    	$oldImg = DB::table('vgift') -> where('id',$id) -> first() -> img;
    	$data = $request -> except('_token','id');
    	if($request -> hasFile('img'))
    	{
    		if($request -> file('img') -> isValid())
    		{
    			$suffix = $request -> file('img') -> getClientOriginalExtension();
    			// echo $suffix;
    			$fileName = time().mt_rand(1,99999).'.'.$suffix;
    			$request -> file('img') -> move('./uploads',$fileName);
    			$data['img'] = '/uploads/'.$fileName;

    			if(file_exists('.'.$oldImg))
    			{
    				unlink('.'.$oldImg);
    			}
    		}
    	}

    	$res = DB::table('vgift') -> where('id',$id) -> update($data);
    	if($res)
    	{
    		return redirect('admin/gift/index') -> with(['info' => '更新成功']);
    	}else
    	{
    		return back() -> with(['info' => '更新失败']);
    	}
    }

    public function delete($id)
    {
    	$res = DB::table('vgift') -> delete($id);
    	if($res)
    	{
    		return redirect('/admin/gift/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}
    }
}
