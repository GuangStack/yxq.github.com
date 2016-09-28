<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MsgController extends Controller
{
    //
    public function add()
    {
    	// dd('aaaaaaaaaaaaaaa');
    	return view('admin.msg.add');
    }

    public function insert(Request $request)
    {
    	$this -> validate($request,[
    		'content' => 'required',
    		],[
    		'content.required' => '内容不能为空',
    		]);
    	// dd($request -> all());
    	if($request -> input('all') == 'on')
    	{
    		// dd('shezhile');
    		$userall = DB::table('users') -> select('user_id') -> get();
    		// dd($userall);
    		$userids = array();
    		foreach ($userall as $k => $v) 
    		{
    			$userids[] = $v -> user_id;
    		}
    		// dd($userids);
    		foreach ($userids as $k => $v) 
    		{
    			DB::table('msg')->insert(['send_id' => $request -> input('send_id'), 'content' => $request -> input('content'), 'time' => time(), 'user_id' => $v]);
    		}
    	}else
    	{
    		// DB::table('users')->insert(['email' => 'john@example.com', 'votes' => 0]);
	    	$userstr = explode(',', $request -> input('user_id'));
	    	// dd($userstr);   //  1 2 3 4 
	    	// $res = '';
	    	foreach ($userstr as $k => $v) 
	    	{
	    		DB::table('msg')->insert(['send_id' => $request -> input('send_id'), 'content' => $request -> input('content'), 'time' => time(), 'user_id' => $v]);
	    	}
    	}
    	
    	// dd('succefful add');
    	// dd($res);
    	// $row = count($userstr)*4;
    	return redirect('admin/msg/index') -> with(['info' => '添加成功']);	
    }

    public function index(Request $request)
    {
    	$num = $request -> input('num',10);
    	$data = DB::table('msg')
    		-> where(function($query) use ($request){
    			$query -> where('user_id','like','%'.$request -> input('keyword').'%');
    		})
    		-> paginate($num);

    	return view('admin.msg.index',['data' => $data,'request' => $request -> all()]);
    }

    public function edit($id)
    {
    	$data = DB::table('msg') -> where('id', $id) -> first();
    	// dd($data);
    	return view('admin.msg.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
    	// dd($request -> all());
    	// DB::table('users')
     	//  ->where('id', 1)
            // ->update(['votes' => 1]);
    	$res = DB::table('msg') 
    		-> where('id', $request -> input('id'))
    		-> update(['content' => $request -> input('content')]);
    	if($res) 
    	{
    		return redirect('/admin/msg/index') -> with(['info' => '更新成功']);

    	}else
    	{
    		return back() -> with(['info' => '更新失败']);
    	}
    }

    public function delete($id)
    {
    	$res = DB::table('msg') -> delete($id);
    	if($res)
    	{
    		return redirect('/admin/msg/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}
    }
}
