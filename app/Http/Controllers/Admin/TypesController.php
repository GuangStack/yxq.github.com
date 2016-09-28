<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class TypesController extends Controller
{
    //add
    public function add()
    {
    	//查询所有分类
	    // $data = DB::table('types') 
	    // 	-> select(['id', 'name','path'])
	    // 	->
	    // 	-> get();
	    $data = DB::select("select id,name,path,pid,CONCAT(path,',',id) as pathStr from types as s order by pathStr");
	    //处理数据
	    foreach($data as $k => $v){
	    	$count =  substr_count($v -> path, ',');
	    	$str = str_repeat('|---',$count);
	    	$data[$k] -> name = $str.$v -> name;
	    }
	    
	    //返回数据
	    return view('admin.types.add',['data' => $data]);
    }
    
    //insert
    public function insert(Request $request)
    {
    	$data = $request -> except('_token');

    	if($request -> input('pid') == 0)
    	{
    		$data['path'] = 0;
    	}else
    	{
    		$path = DB::table('types') -> where('id',$request -> input('pid')) -> first() -> path  ;
    		//处理path字段
    		$data['path'] = $path.','.$request -> input('pid');
    	}
  
    	
    	//添加数据
    	$res = DB::table('types') -> insert($data);

    	if($res)
    	{
    		return redirect('/admin/types/index') -> with(['info' => '添加成功']);
    	}else
    	{
    		return back() -> with(['info' => '添加失败']);
    	}
    }

    //index
    public function index()
    {
    	
    	//查询所有分类
	   // $data = DB::table('types') 
	   // 	-> select(['id', 'name','path','pid', DB::raw('CONCAT(path, "," , id) AS pathStr'),DB::raw(select count(*) from topic /as c where c.tid1=s.id or c.tid2=s.id or c.tid3=s.id) as tcount)])
	    //	-> orderBy('pathStr' , 'ASC')
	    //	-> get();
	   $data = DB::select("select id,name,path,pid,CONCAT(path,',',id) as pathStr,(select count(*) from topic as c where c.tid1=s.id or c.tid2=s.id or c.tid3=s.id) as tcount from types as s order by pathStr");

	    //dd($data);
	   
	    //处理数据
	    foreach($data as $k => $v){
	    	$count =  substr_count($v -> path, ',');
	    	$str = str_repeat('|---',$count);
	    	$data[$k] -> name = $str.$v -> name;
	    } 

    	return view('admin.types.index',['data' => $data]);
    }

    //编辑   edit
    public function edit($id)
    {
    	//查询数据
    	$data = DB::table('types') -> where('id',$id) -> first();
    	//返回结果
    	return view('admin.types.edit',['data' => $data]);
    }

    public function update(Request $request)
    {
    	//验证提交的是否为空

    	$this -> validate($request,[
    		'name' => 'required',
    		
    		],[
    		'name.required' => '标题不能为空',
    		
    		]);

    	//处理数据
    	$data = $request -> except('_token');

    	//执行更新操作
    	$res = DB::table('types') -> where('id',$data['id']) -> update($data);

    	//判断
    	if($res)
    	{
    		return redirect('/admin/types/index') -> with(['info' => '更新成功']);
    	}else
    	{
    		return back() -> with(['info' => '更新失败']);
    	}
    }

     //删除   delete
    public function delete($id)
    {
    	//执行删除操作
    	$res = DB::table('types') -> delete($id);

    	//判断结果
    	if($res)
    	{
    		return redirect('/admin/types/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}

    }
}
