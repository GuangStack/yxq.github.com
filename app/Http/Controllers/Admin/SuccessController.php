<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class SuccessController extends Controller
{
    //add
    public function add()
    {
    	 return view('admin.success.add');

    }

    //插入数据   insert
    public function insert(Request $request)
    {
    	//验证传送过来的东西是否为空
    	$this -> validate($request,[
    		'title' => 'required',
    		'detail' => 'required',
    		'image' => 'required',
    		'time' => 'required',
    		'manname' => 'required',
    		'womanname' => 'required',    		
    		'introduce' => 'required',
    		'type' => 'required',
    		],[
    		'title.required' => '标题不能为空',
    		'detail.required' => '内容不能为空',
    		'image.required' => '图片不能为空',
    		'time.required' => '结婚时间不能为空',    		    		
    		'manname.required' => '女方姓名不能为空',
    		'womanname.required' => '男方姓名不能为空',
    		'introduce.required' => '简介不能为空',
    		'type.required' => '类型不能为空',
    		]);
    	//处理数据
    	$data = $request -> except('_token');
    	//把时间转换为时间戳
    	$time = strtotime($data['time']);
    	
    	$data['time'] = $time;
    	//处理时间
    	$data['addtime'] = time();
    	
    	//处理图片
    	if($request ->hasFile('image'))
    	{
    		if($request -> file('image') -> isValid())
    		{
    			//获取图片的扩展名称
    			$suffix = $request -> file('image') -> getClientOriginalExtension();
    			//随机文件名称
    			$fileName = time().mt_rand(10000000,99999999).'.'.$suffix;

    			//移动文件
    			$request -> file('image') -> move('./uplodes',$fileName);
    		}
    	}
    	//处理img字段
    	$data['image'] = '/uplodes/'.$fileName;
    	
    	//执行添加
    	$res = DB::table('success') -> insert($data);

    	if($res)
    	{
    		return redirect('/admin/success/index') -> with(['info' => '添加成功']);
    	}else
    	{
    		return redirect('/admin/success/add') -> with(['info'  => '添加失败']);
    	}
    }

    //index
    public function index(Request $request)
    {
    	//获取属性
    	$num = $request -> input('num', 10);

    	//查询数据库
    	$data = DB::table('success')
    		->where(function($query) use ($request){
    			$query -> where('title','like','%'.$request -> input('keyword').'%');
    		})
    	 	-> paginate($num);
    	 	//dd($data);
    	//返回结果
    	return view('admin.success.index',['data' => $data,'request' => $request -> all() ]);
    }

    //edit
    public function edit($id)
    {
    	//先查询出数据
    	$data = DB::table('success') -> where('id',$id) -> first();
    	//获取type类型
    	$type = $data -> type;
    
    	return view('admin.success.edit',['data' => $data,'type' => $type]);
    }

    //更新数据
    public function update(Request $request)
    {

    	//验证传送过来的东西是否为空
    	$this -> validate($request,[
    		'title' => 'required',
    		'detail' => 'required',
    		'image' => 'required',
    		'time' => 'required',
    		'manname' => 'required',
    		'womanname' => 'required',    		
    		'introduce' => 'required',
    		'type' => 'required',
    		],[
    		'title.required' => '标题不能为空',
    		'detail.required' => '内容不能为空',
    		'image.required' => '图片不能为空',
    		'time.required' => '结婚时间不能为空',    		    		
    		'manname.required' => '女方姓名不能为空',
    		'womanname.required' => '男方姓名不能为空',
    		'introduce.required' => '简介不能为空',
    		'type.required' => '类型不能为空',
    		]);

    	//处理数据
    	$data = $request -> except('_token');
    	//把时间转换为时间戳
    	$time = strtotime($data['time']);
    	
    	$data['time'] = $time;
    	//处理时间
    	$data['addtime'] = time();

    	//处理图片
    	if($request ->hasFile('image'))
    	{
    		if($request -> file('image') -> isValid())
    		{
    			//获取图片的扩展名称
    			$suffix = $request -> file('image') -> getClientOriginalExtension();
    			//随机文件名称
    			$fileName = time().mt_rand(10000000,99999999).'.'.$suffix;

    			//移动文件
    			$request -> file('image') -> move('./uplodes',$fileName);
    		}
    	}
    	//处理img字段
    	$data['image'] = '/uplodes/'.$fileName;

    	//处理更新
    	$res = DB::table('success') -> where('id',$data['id']) -> update($data);
    	if($res)
    	{
    		return redirect('/admin/success/index') -> with(['info' => '更新成功']);
    	}else
    	{
    		return back() -> with(['info' => '更新失败']);    	
    	}
    }

    //删除数据
    public function delete($id)
    {
    	//执行删除操作
    	$res = DB::table('success') -> delete($id);

    	//判断结果
    	if($res)
    	{
    		return redirect('/admin/success/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}
    }
}
