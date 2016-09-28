<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HongController extends Controller
{
    //
    public function add()
    {
    	return view('admin.hong.add');
    }

    public function insert(Request $request)
    {
    		$this -> validate($request,[
    		'name' => 'required',
    		'email' => 'required|email',
    		'phone' => 'max:11|min:11',
    		'img' => 'required',
    		],[
    		'name.required' => '用户名不能为空',
    		'email.required' => '邮箱不能为空',
    		'email.email' => '邮箱格式不正确',
    		'phone.max' => '手机号必须是11位的',
    		'phone.min' => '手机号必须是11位的',
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
    			$fileName = time().mt_rand(1,99999).'.'.$suffix;
    			$request -> file('img') -> move('./uploads',$fileName);
    			$data['img'] = '/uploads/'.$fileName;
    		}
    	}

    	$res = DB::table('hong') -> insert($data);
    	if($res)
    	{
    		return redirect('admin/hong/index') -> with(['info' => '添加成功']);
    	}else
    	{
    		return back() -> with(['info' => '添加失败']);
    	}
    }

    public function index(Request $request)
    {
    	$data = DB::table('hong') -> get();
    	// dd($data);
    	// dd(222222222222222222222222);

    	return view('admin.hong.index',['data' => $data]);
    }

    public function edit($id)
    {
    	// return $id;
    	$data = DB::table('hong') -> where('id',$id) -> first();
    	// dd($data);

    	return view('admin.hong.edit',['data' => $data]);
    }

    public function update(Request $request)
    {
    	$id = $request -> input('id');
    	$oldImg = DB::table('hong') -> where('id',$id) -> first() -> img;
    	$data = $request -> except('_token','	id');
    	// dd($data);
    	if($request -> hasFile('img'))
    	{
    		// dd('aaaa');
    		if($request -> file('img') -> isValid())
    		{
    			$suffix = $request -> file('img') -> getClientOriginalExtension();
    			// echo $suffix;
    			$fileName = time().mt_rand(1,9999).'.'.$suffix;
    			$request -> file('img') -> move('./uploads',$fileName);
    			$data['img'] = '/uploads/'.$fileName;
    			// dd($data['img']);
    			if(file_exists('.'.$oldImg))
    			{
    				unlink('.'.$oldImg);
    			}
    		}
    	}

    	$res = DB::table('hong') -> where('id',$id) -> update($data);
    	if($res)
    	{
    		return redirect('admin/hong/index') -> with(['info' => '更新成功']);
    	}else
    	{
    		return back() -> with(['info' => '失败更新']);
    	}
  }

    public function delete($id)
    {
    	// return $id;
    	$res = DB::table('hong') -> delete($id);
    	if($res)
    	{
    		return redirect('/admin/hong/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}
    }
}
