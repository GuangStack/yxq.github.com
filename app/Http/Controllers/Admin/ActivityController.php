<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class ActivityController extends Controller
{
    //
    public function add()
    {
    	// return 'active add';
    	return view('admin.activity.add');
    }

    public function insert(Request $request)
    {
    	// dd($request ->all());
    	// dd($data);
    	$data = $request ->except('_token');

    	if ($request->hasFile('img'))
	    	{
	    
		    	 if ($request->file('img')->isValid()) 
		    	 {
		    	 	 //获取图片的后缀名
	       				$suffix = $request -> file('img') -> getClientOriginalExtension();
	       				//随机名称
	       				$filename = time().mt_rand(10000,99999).'.'.$suffix;

	       				$request -> file('img') -> move('./uploads',$filename);

	       				 //处理img字段
	       				$data['img'] = '/uploads/'.$filename;

         			
	       		}
	    	 }

			     
			    $res = DB::table('activity') -> insert($data);
		    if($res)
		    {
		    	return redirect('admin/activity/index') -> with(['info'=> '添加成功'] );
		    }else{


		    	return back() -> with(['info' => '添加失败']);
		    }
    }

    public function index(Request $request)
    {
    	 $num = $request -> input('num',3);

        $data = DB::table('activity') 
            ->where(function($query) use($request){
                $query->where('title','like','%'.$request ->input('keyword').'%');
            })
          
            -> paginate($num);

      
        return view('admin.activity.index',
            ['data' => $data,'request' => $request ->all()]);

    }
    public function edit($id)
    {
    	$data = DB::table('activity') -> where('id', $id) -> first();
    	// dd($data);
    	 return view('admin.activity.edit',['data' => $data]);
    }

    public function update(Request $request)
    {
    	// dd($request-> all());
    	$data = $request -> except('_token');
    	 $id = $request -> input('id');
     //旧图片
      $oldImg = DB::table('activity') -> where('id', $id ) ->first() -> img;
      // dd($oldImg);

      $data = $request -> except('_token','id');
      // dd($data);
      //是否有新的图片上传
      if($request -> hasFile('img'))
      {

          if($request -> file('img') -> isValid())
          {
              //获取图片的后缀名称
              $suffix = $request -> file('img') ->
              getClientOriginalExtension();
              //获取随机名
              $fileName = time().mt_rand(10000,99999).'.'.$suffix;
              //移动
                $request ->file('img') ->move('./uploads',$fileName);

                $data['img'] = '/uploads/'.$fileName;
              if(file_exists('.'.$oldImg))
              {
                unlink('.'.$oldImg);
              }

          }
      }
      
      $res = DB::table('activity') -> where('id', $id) -> update($data);
       if($res)
           {
            return  redirect('admin/activity/index') -> with(['info' =>'更新成功']);
           }else{

            return back() -> with(['info' => '更新失败']);

           }

    }

    public function delete($id)
    {
    	$res = DB::table('activity') -> delete($id);

    	if($res)
    	{
    		return redirect('admin/activity/index') -> with(['info' => '删除成功']);
    	}else{


    		return back() -> with(['info' => '添加失败']);
    	}
    }

     public function details($id)
    {
    	$data = DB::table('activity') -> where('id', $id) -> first();
    	 // dd($data);
    	  return view('admin.activity.details',['data' => $data]);
    }	

	// public function show()
	// {
	// 	return 'show';

	// }


}
