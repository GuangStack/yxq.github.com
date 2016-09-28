<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
class LoginController extends Controller
{
    //
    public function login()
    {
    	 return view('admin.login.login');
    	
    }

    public function doLogin(Request $request)
    {
    	// dd($request ->all());   	
    	
    		$this ->validate($request, [

             
                'email' => 'required|email',
                'password' =>'required',
               

            ],[

                'email.required' => '邮箱不能为空',
                'email.email' => '邮箱格式不正确',
                'password.required' =>'密码不能为空',
              

            ]);
 


    	$data = $request -> except('_token');
    	// dd($data);

    	

    	//判断验证码 
	    	// if($data['code'] == session('milkcaptcha'))
	    	// {
	    		
		  		
		    //根据邮箱的名称查询数据库
		    	$res = DB::table('admins') -> where('email',$data['email']) ->first();
		   		     // dd($res);
			//这是数据库中的密码
		    		 $password = $res -> password;
		    		$aa = Crypt::decrypt($password);
		    		  // dd($aa);
		    	
		    		if($data['password'] == $aa)
		    		{
		    			// return 'aa';
		    			session(['master' => $res]);
		    			
		    			return redirect('/admin/index/index') -> with(['info' =>'登陆成功']);
		    						
		    		}else{

		    		return back() -> with(['info' => '密码错误']);
		    	
	   		 		}
	   		// }else{
	   		// 	return back() -> with(['info' => '验证错误']);
	   		// }
			

		

	}


	public function logout()
	   	{
	   		session() -> flush();
	   		return redirect('admin/login') -> with(['info' => '请登录']);
	   	}

}