<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class FriendController extends Controller
{
    //
    public function index(Request $request)
    {
    	$num = $request -> input('num',10);

    	// $data = DB::table('users')
    	// 	-> where(function($query) use ($request){
    	// 		$query -> where('name','like','%'.$request -> input('keyword').'%');
    	// 	})
    	// 	-> paginate($num);
    	$userid = DB::table('users') -> select('user_id') -> get();
    	$num = count($userid);

    	$farr = array();
    	for ($i=1; $i <= $num; $i++) { 
    		$data = DB::table('friend') -> select('friendid') -> where('user_id', $i) -> get();
    		$str = "";
	    	foreach ($data as $key => $value) {
	    		$str .= $value -> friendid ." , ";

	    	}
	    	$str = rtrim($str,', ');
	    	$farr[$i] = $str;
    	}
    	// dd($farr);
    	$concern = DB::table('concern') -> select('concern_id') -> get();
    	$carr = array();
    	for ($i=1; $i <= $num; $i++)
    	{ 
    		$data = DB::table('concern') -> select('concern_id') -> where('user_id', $i) -> get();
    		$str = "";
	    	foreach ($data as $key => $value) {
	    		$str .= $value -> concern_id ." , ";

	    	}
	    	$str = rtrim($str,', ');
	    	$carr[$i] = $str;
    	}

    	$concern = DB::table('concern') -> select('user_id') -> get();
    	$carred = array();
    	for ($i=1; $i <= $num; $i++)
    	{ 
    		$data = DB::table('concern') -> select('user_id') -> where('concern_id', $i) -> get();
    		$str = "";
	    	foreach ($data as $key => $value) {
	    		$str .= $value -> user_id ." , ";

	    	}
	    	$str = rtrim($str,', ');
	    	$carred[$i] = $str;
    	}

    	// dd($carr);

    	return view('admin.friend.index',['farr' => $farr,'carr' => $carr,'carred' => $carred]);
    }

    public function add()
    {
    	return view('admin.friend.add');
    }

    public function insert(Request $request)
    {
    	$this -> validate($request,[
    		'user_id' => 'required',
    		'friendid' => 'required',
    		],[
    		'user_id.required' => '好友编号不能为空',
    		'friendid.required' => '好友编号不能为空',
    		]);
    	// dd($request -> all());
    	// $data = $request -> except('_token','type');
    	// dd($data);
    	if($request -> input('type') == '好友')
    	{
    		$time = time();
    		// $res = DB::table('friend') -> insert($data);
    		$res = DB::insert('insert into friend (user_id, friendid, addtime) values (?, ?, ?)', [$request -> input('user_id'), $request -> input('friendid'), $time]);
    		$res1 = DB::insert('insert into friend (user_id, friendid, addtime) values (?, ?, ?)', [$request -> input('friendid'), $request -> input('user_id'), $time]);
	    	if($res && $res1)
	    	{
	    		return redirect('admin/friend/index') -> with(['info' => '添加成功']);
	    	}else
	    	{
	    		return back() -> with(['info' => '添加失败']);
	    	}
    	}

    	if($request -> input('type') == '关注')
    	{
    		// $res = DB::table('friend') -> insert($data);
    		$res = DB::insert('insert into concern (user_id, concern_id) values (?, ?)', [$request -> input('user_id'), $request -> input('friendid')]);
    		
	    	if($res)
	    	{
	    		return redirect('admin/friend/index') -> with(['info' => '添加成功']);
	    	}else
	    	{
	    		return back() -> with(['info' => '添加失败']);
	    	}
    	}

    	if($request -> input('type') == '被关注')
    	{
    		// $res = DB::table('friend') -> insert($data);
    		$res = DB::insert('insert into concern (concern_id, user_id) values (?, ?)', [$request -> input('user_id'), $request -> input('friendid')]);
    		
	    	if($res)
	    	{
	    		return redirect('admin/friend/index') -> with(['info' => '添加成功']);
	    	}else
	    	{
	    		return back() -> with(['info' => '添加失败']);
	    	}
    	}
    	
    }

    public function edit($id,$t)
    {
    	if($t ==1)
    	{
    		$type = $t;
    		$data = DB::table('friend') -> where('user_id',$id) -> get();
    		// dd($data);
    		if(!$data)
    		{
    			return back() -> with(['info' => '好友为空，不能编辑']);
    		}
    		$user_id = $data['0'] -> user_id;
    		$farr = array();
    		foreach ($data as $k => $v)
    		{
    			$farr[] = $v -> friendid;
    		}
    		// dd($farr);
    		$str = implode($farr, ',');
    		$placeholder = '你的好友';
    		// dd($fstr);
    	}

    	if($t == 2)
    	{
    		$type = $t;
    		$data = DB::table('concern') -> where('user_id',$id) -> get();
    		if(!$data)
    		{
    			return back() -> with(['info' => '没有关注的用户，不能编辑']);
    		}
    		// dd($data);
    		$user_id = $data['0'] -> user_id;
    		$carr = array();
    		foreach ($data as $k => $v) 
    		{
    			$carr[] = $v -> concern_id;
    		}
    		$str = implode($carr, ',');
    		$placeholder = '你关注的';
    	}

    	if($t == 3)
    	{
    		$type = $t;
    		$data = DB::table('concern') -> where('concern_id',$id) -> get();
    		if(!$data)
    		{
    			return back() -> with(['info' => '没人关注你，不能编辑']);
    		}
    		// dd($data);
    		$user_id = $data['0'] -> concern_id;
    		$carr = array();
    		foreach ($data as $k => $v) 
    		{
    			$carr[] = $v -> user_id;
    		}
    		$str = implode($carr, ',');
    		$placeholder = '关注你的';
    	}
    	
    	return view('admin.friend.edit',['user_id' => $user_id, 'fstr' => $str,'type' => $type, 'placeholder' => $placeholder]);
    }

    public function update(Request $request)
    {
    	$this -> validate($request,[
    		'user_id' => 'required',
    		'friendid' => 'required',
    		],[
    		'user_id.required' => '用户编号不能为空',
    		'friendid.required' => '好友编号不能为空',
    		]);
    	$id = $request -> input('id');
    	// dd($request -> all());
    	$data = $request -> except('_token','id', 'place');
    	// dd($data);
    	if($request -> input('place') == '你的好友')
    	{
    		// dd($request -> input('friendid'));

    		$arr = explode(',', $request -> input('friendid'));
    		// dd($arr);
    		// foreach ($arr as $k => $v) 
    		// {
    		// 	$res = DB::update('update friend set friendid = '.$v.' where user_id = ?', [$id]);
    		// }

    		

	    	if($res)
	    	{
	    		return redirect('admin/friend/index') -> with(['info' => '更新成功']);
	    	}else
	    	{
	    		return back() -> with(['info' => '更新失败']);
	    	}
	    }
    }
 
}
