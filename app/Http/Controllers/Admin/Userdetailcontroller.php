<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class Userdetailcontroller extends Controller
{
    //add
    public function add()
    {
    	
    	return view('admin.userdetail.add');
    }

    //charu
    public function insert(Request $request)
    {
    	//处理数据
    	$data = $request -> except('_token');

    	//执行添加
    	$res = DB::table('userdetails') -> insert($data);

    	if($res)
    	{
    		return redirect('admin/userdetail/index') -> with(['data' => $data]);
    	}else
    	{
    		return back() -> with(['info' => '添加失败']);
    	}
    }

    //index
    public function index()
    {
        $data = DB::table('userdetails') -> get();
        return view('admin.userdetail.index',['data' => $data]);
    }

    //编辑
    public function edit($id)
    {
        //先查询出数据
        $data = DB::table('userdetails') -> where('id',$id) -> first();
        
        
    
        return view('admin.userdetail.edit',['data' => $data]);
    }

    //更新
    public function update(Request $request)
    {
        //处理数据
        $data = $request -> except('_token');
        //把时间转换为时间戳
        $time = strtotime($data['birthday']);

        $data['birthday'] = $time;
        
        //处理更新
        $res = DB::table('userdetails') -> where('id',$data['id']) -> update($data);
        if($res)
        {
            return redirect('/admin/userdetail/index') -> with(['info' => '更新成功']);
        }else
        {
            return back() -> with(['info' => '更新失败']);      
        }
    }

    //delete
    public function delete($id)
    {
        //执行删除操作
        $res = DB::table('userdetails') -> delete($id);

        //判断结果
        if($res)
        {
            return redirect('/admin/userdetail/index') -> with(['info' => '删除成功']);
        }else
        {
            return back() -> with(['info' => '删除失败']);
        }
    }
}
