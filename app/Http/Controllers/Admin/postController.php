<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Poll;  // 用数据模型
class postController extends Controller
{
    //edit
    public function ajaxPostUpdate(Request $request)
    {	
    	
    		//处理数据
        
    	$id = $request -> input('id');
        
        $data = $request -> except('_token','id',);
    	 //dd($data);
    	$res = DB::table('post') -> where('id',$id) -> update($data);
        if($res)
        {
            return response() -> json(0);
            // return redirect('admin/topic/post/'.$data['rid']) ;
        }else
        {
            return response() -> json(1);
             //return back()  -> with(['info' => '编辑失败']);
        }
    	
    }

    public function ajaxPostdelete($id)
    {
    	//执行删除操作
    	$res = DB::table('post') -> delete($id);

    	//判断结果
    	if($res)
    	{
    		return redirect('/admin/topic/post') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}
    }
}
