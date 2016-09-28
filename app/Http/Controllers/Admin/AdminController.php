<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Crypt;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class AdminController extends Controller
{
    //
    public function add()
    {

    	return view('admin.admin.add');
    	
    }
    public function insert(Request $request)
    {
    	// dd($request ->all());
    	$this -> validate($request, [

              'realname' => 'required',
              'username' => 'required',
                'email' => 'required|email',
                'phone' =>'required',
                'phone' =>'max:11|min:11',
                'password' =>'required',
                'repassword' => 'required|same:password',
                'auth' => 'required'

            ],[

            	'realname.required' =>'请输入真实姓名',
                'username.required' => '用户名不能为空',
                'email.required' => '邮箱不能为空',
                'email.email' => '邮箱格式不正确',
                'phone.required' => '不能为空手机号',
                'phone.max' => '手机号必须为11位',
                'phone.min' => '手机号必须为11位',
                'password.required' =>'密码不能为空',
                'repassword.required' =>'确认密码不能为空',
                'repassword.same' =>'密码不一致',
                'auth.required' =>'请选择权限'

            ]);


	    	 $data = $request ->except('_token','repassword');
         // dd($data);
	    	 $data['password'] = Crypt::encrypt($data['password']);
	    	 // dd($data);

	    	if ($request->hasFile('img'))
	    	{
	    
		    	 if ($request->file('img')->isValid()) 
		    	 {
		    	 	 //获取图片的后缀名
	       				$suffix = $request -> file('img') -> getClientOriginalExtension();
	       				//随机名称
	       				$filename = time().mt_rand(10000,99999).$suffix;

	       				$request -> file('img') -> move('./uploads',$filename);

	       				 //处理img字段
         			$data['img'] = '/uploads/'.$filename;
	       		}
	    	 }


        $data['remember_token'] = str_random('70');
        $data['lastip'] = $_SERVER['REMOTE_ADDR'];
        // dd($data);
        // $data['lasttime'] = 
          $res = DB::table('admins') -> insert($data);

    		if($res)
    		{
    			return redirect('admin/admin/index') -> with(['info'=>'添加成功']);
    		}else{

    			return redirect('admin/admin/add') -> with(['info' => '添加失败']);
    		}

	 }  

	 public function index(Request $request)
	 {
	 		// $data =DB::table('admins') -> get();
	 		$num = $request -> input('num',10);

        	$data = DB::table('admins') 
            -> where(function($query) use($request){
                $query->where('username','like','%'.$request ->input('keyword').'%');
            })
          
            -> paginate($num);
	 		
	 		return view('admin.admin.index',['data' => $data,'request' => $request ->all()]);
	 }

	 public function edit($id)
	 {
	 	$data = DB::table('admins') -> where('id',$id) -> first();
	 	// dd($data);
	 	return view('admin.admin.edit',['data' => $data]);

	 }
	

	 public function update(Request $request)
	 {
		$this -> validate($request, [

              'username' => 'required',
                'email' => 'required|email',
                'phone' =>'required',
                'phone' =>'max:11|min:11'

            ],[

                'username.required' => '用户名不能为空',
                'email.required' => '邮箱不能为空',
                'email.email' => '邮箱格式不正确',
                'phone.required' => '不能为空手机号',
                'phone.max' => '手机号必须为11位',
                'phone.min' => '手机号必须为11位'


            ]);



		$id = $request -> input('id');
     //旧图片
      $oldImg = DB::table('admins') -> where('id', $id ) ->first() -> img;
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


        //执行更新
       $res = DB::table('admins') -> where('id',$request ->input('id'))->update($data);
        //判断
        if($res)
        {
            return redirect('admin/admin/index') -> with(['info'=>'更新成功']);
        }else
        {
            return back() -> with(['info' => '更新失败']);
        }


	 }

	 public function delete($id)
	 {
	 	$res = DB::table('admins') -> delete($id);
	 	if($res)
	 	{
	 		return redirect('/admin/admin/index') -> with(['info'=> '删除成功']);
	 	}else{

	 		return back() -> with(['info' => '删除失败']);
	 	}

	 }

}
