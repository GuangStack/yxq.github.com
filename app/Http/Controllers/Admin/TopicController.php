<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class TopicController extends Controller
{
    //add  
    public function add($user_id)
    {

        //查询数据
        $data = DB::table('types') -> where('pid', '<>', 0) -> get();
        // $data = DB::select('select * from types where pid != 0');
       // dd($data);
    
    	return view('admin.topic.topicAdd',['user_id' => $user_id],['data' => $data]);
    }

    //insert
    public function insert(Request $request)
    {
    	// dd($request -> all());
    	//验证传送过来的东西是否为空
    	$this -> validate($request,[
    		'title' => 'required',
    		'content' => 'required',
    		],[
    		'title.required' => '标题不能为空',
    		'content.required' => '内容不能为空',
    		]);

    	//处理数据
    	$data = $request -> except('_token','user_id','type');
    	$data['uid'] = $request -> input('user_id');
        $data['tid1'] = $request -> input('type');
    	$data['time'] = time();
        $data['content'] =strip_tags($request -> input('content'));
    	
    	//添加数据
    	$res = DB::table('topic') -> insert($data);

    	if($res)
    	{
    		return redirect('/admin/topic/index') -> with(['info' => '添加成功']);
    	}else
    	{
    		return redirect('/admin/topic/topicAdd') -> with(['info' => '添加失败']);
    	}
    }

    //index
    public function index(Request $request)
    {
    	//获取属性
    	$num = $request -> input('num', 10);

    	//查询数据库
    	$data = DB::table('topic')
    		->where(function($query) use ($request){
    			$query -> where('title','like','%'.$request -> input('keyword').'%');
    		})
    	 	-> paginate($num);
    	 	//dd($data);
    	//返回结果
    	return view('admin.topic.index',['data' => $data,'request' => $request -> all() ]);
    
    }

    //edit  编辑
    public function edit($id)
    {
    	//查询数据库
    	$data = DB::table('topic') -> where('id',$id) -> first();
    	//返回结果
    	return view('admin.topic.edit',['data' => $data]);
    }

    //更新数据    update
    public function update(Request $request)
    {
    	//验证提交的是否为空

    	$this -> validate($request,[
    		'title' => 'required',
    		'content' => 'required',
    		],[
    		'title.required' => '标题不能为空',
    		'content.required' => '内容不能为空',
    		]);

    	//处理数据
    	$data = $request -> except('_token');

    	//执行更新操作
    	$res = DB::table('topic') -> where('id',$data['id']) -> update($data);

    	//判断
    	if($res)
    	{
    		return redirect('/admin/topic/index') -> with(['info' => '更新成功']);
    	}else
    	{
    		return back() -> with(['info' => '更新失败']);
    	}
    }

    //删除   delete
    public function delete($id)
    {
    	//执行删除操作
    	$res = DB::table('topic') -> delete($id);

    	//判断结果
    	if($res)
    	{
    		return redirect('/admin/topic/index') -> with(['info' => '删除成功']);
    	}else
    	{
    		return back() -> with(['info' => '删除失败']);
    	}

    }

    //
    public function ajaxTitle(Request $request)
    {
        
        $title = $request -> input('title');

        //查询
        $res = DB::table('topic') -> where('title',$title) -> first();
        if($res)
        {   
            //1代表标题已经存在
            return response() -> json(1);
        }else
        {
            $res = DB::table('topic') -> where ('id',$request -> input('id')) -> update(['title' => $title]);
            if($res)
            {
                return response() -> json(0);
            }else
            {
                return response() -> json(2);
            }
        }



    }

    //post
    public function post($id)
    {
        // SELECT t.title,t.content,t.uid,t.id,p.user_id,p.content,uu.username FROM topic AS t LEFT JOIN post AS p ON t.id=p.topic_id LEFT JOIN users AS uu ON p.user_id = uu.user_id;
        // select t.title,t.content,t.uid,u.username  from topic t left join users u on u.user_id=t.uid where t.id=1;
        $data = DB::table('topic AS t')
                ->select('t.title','t.content','t.uid','t.id','p.ctime','p.user_id','p.content','uu.username','p.topic_id','p.id')
                ->leftJoin('post AS p','t.id' ,'=','p.topic_id')
                ->leftJoin('users AS uu','p.user_id','=','uu.user_id')
                ->where('p.topic_id',$id)
                ->get();
        //dd($data);
        $resut = DB::table('topic AS t')
                ->select('t.title','t.content','t.uid','t.time','u.username','t.id')
                ->leftJoin('users AS u','u.user_id','=','t.uid')
                ->where('id',$id)
                ->first();
       // dd($resut);
        return view('admin.topic.post',['data' => $data],['resut' => $resut]);

    }

     public function ajaxPostUpdate(Request $request)
    {   
        
            //处理数据
        
        $id = $request -> input('id');
        
        $data = $request -> except('_token','id');
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
}
