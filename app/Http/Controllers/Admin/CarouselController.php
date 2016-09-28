<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class CarouselController extends Controller
{
    //add
    public function add()
    {
    	
    	return view('admin.carousel.add');
    }

    //insert
    //插入数据   insert
    public function insert(Request $request)
    {
    	//dd($request -> all());
        $rest = DB::table('lunbo') -> where('id',$request -> id) -> first();
        // dd($rest);
        if(empty($rest)){

        } 
    	//验证传送过来的东西是否为空
    	$this -> validate($request,[
    		
    		'id' => 'required',
    		],[
    		'id.required' => 'ID不能为空',
    		
    		
    		]);
    	//处理数据
    	$data = $request -> except('_token');
    	
    	
    	
    	
    	
    	//处理图片
    	function img($image,Request $request,$data){
    	if($request ->hasFile($image))
    	{
    		if($request -> file($image) -> isValid())
    		{
    			//获取图片的扩展名称
    			$suffix = $request -> file($image) -> getClientOriginalExtension();
    			//随机文件名称
    			$fileName = time().mt_rand(10000000,99999999).'.'.$suffix;

    			//移动文件
    			$request -> file($image) -> move('./uplodes',$fileName);
    		}
    	}
    	//处理img字段
    	$data[$image] = '/uplodes/'.$fileName;
    	return  $data[$image];
    	//
    	}
    	$data['image1']=img('image1', $request,$data);
    	$data['image2']=img('image2', $request,$data);
    	$data['image3']=img('image3', $request,$data);
    	$data['image4']=img('image4', $request,$data);
    	//dd($data);
        if(empty($rest)){
            //执行添加
        $res = DB::table('lunbo') -> insert($data);

        if($res)
        {
            return redirect('/admin/carousel/index') -> with(['info' => '添加成功']);
        }else
        {
            return redirect('/admin/carousel/add') -> with(['info'  => '添加失败']);
        }
        }else
        {
            return redirect('/admin/carousel/index') -> with(['info' => '数据已存在，请更新']);
        }
    	
    }


    //index
    //index
    public function index()
    {
    	

    	//查询数据库
    	$data = DB::table('lunbo') -> get();
    		
    	//返回结果
    	return view('admin.carousel.index',['data' => $data]);
    }

    //更新图潘
    public function ajaxUpdate(Request $request)
    {
    	
    	//dd($request -> all());
    	$data = $request -> except('_token');
    	function img($image,Request $request,$data){
    	if($request ->hasFile($image))
    	{
    		if($request -> file($image) -> isValid())
    		{
    			//获取图片的扩展名称
    			$suffix = $request -> file($image) -> getClientOriginalExtension();
    			//随机文件名称
    			$fileName = time().mt_rand(10000000,99999999).'.'.$suffix;

    			//移动文件
    			$request -> file($image) -> move('./uplodes',$fileName);
    		}
    	}
    	//处理img字段
    	$data[$image] = '/uplodes/'.$fileName;
    	return  $data[$image];
    	//
    	}
    	$data[$data['img']]=img($data['img'], $request,$data);
    	//$data1 = $data -> except('img');
    	//dd($data);
    	//执行添加
    	$res = DB::table('lunbo') 
    	->where('id',$data['id']) 
    	->update([$data['img'] => $data[$data['img']]]);

    	if($res)
    	{
    		return redirect('/admin/carousel/index') -> with(['info' => '修改成功']);
    	}else
    	{
    		return redirect('/admin/carousel/add') -> with(['info'  => '修改失败']);
    	}
    }
}
