<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class TaskController extends Controller
{
    //
    public function add()
    {
    	return view('admin.task.add');
    }

    public function insert(Request $request)
    {
    	$this -> validate($request,[
    		'title' => 'required',
    		'content' => 'required',
    		'image' => 'required',
    		],[
    		'title.required' => '标题不能为空',
    		'content.required' => '内容不能为空',
    		'image.required' => '请上传图片',
    		]);
    	// dd($request -> all());
    	$data = $request -> except('_token');

    	if($request -> hasFile('image'))
    	{
    		// dd($data);
    		if($request -> file('image') -> isValid())
    		{
    			$suffix = $request -> file('image') -> getClientOriginalExtension();
    			// echo $suffix;
    			$fileName = time().mt_rand(1,999999).'.'.$suffix;
    			$request -> file('image') -> move('./uploads',$fileName);
    			$data['image'] = '/uploads/'.$fileName;
    		}
    	}

    	$res = DB::table('task') -> insert($data);
    	if($res)
    	{
    		return redirect('admin/task/index') -> with(['info' => '添加成功']);
    	}else
    	{
    		return back() -> with(['info' => '添加失败']);
    	}
    }

    public function index()
    {
    	$data = DB::table('task') -> get();
    	return view('admin.task.index',['data' => $data]);
    }

    public function edit($id)
    {
    	$data = DB::table('task') -> where('id',$id) -> first();
    	return view('admin.task.edit',['data' => $data]);
    }

    public function update(Request $request)
    {
    	$this -> validate($request,[
    		'title' => 'required',
    		'content' => 'required',
    		'image' => 'required',
    		],[
    		'title.required' => '标题不能为空',
    		'content.required' => '内容不能为空',
    		'image.required' => '请上传图片',
    		]);
    	$id = $request -> input('id');
    	$oldImg = DB::table('task') -> where('id',$id) -> first() -> image;
    	$data = $request -> except('_token','id');
    	if($request -> hasFile('image'))
    	{
    		if($request -> file('image') -> isValid())
    		{
    			$suffix = $request -> file('image') -> getClientOriginalExtension();
    			// echo $suffix;
    			$fileName = time().mt_rand(1,99999).'.'.$suffix;
    			$request -> file('image') -> move('./uploads',$fileName);
    			$data['image'] = '/uploads/'.$fileName;

    			if(file_exists('.'.$oldImg))
    			{
    				unlink('.'.$oldImg);
    			}
    		}
    	}

    	$res = DB::table('task') -> where('id',$id) -> update($data);
    	if($res)
    	{
    		return redirect('admin/task/index') -> with(['info' => '更新成功']);
    	}else
    	{
    		return back() -> with(['info' => '更新失败']);
    	}
    }

    public function delete($id)
    {
    	$res = DB::table('task') -> delete($id);
    	if($res)
    	{
    		return redirect('/admin/task/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}
    }
}

