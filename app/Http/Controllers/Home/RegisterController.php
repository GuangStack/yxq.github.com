<?php

namespace App\Http\Controllers\Home;
 
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Crypt;
class RegisterController extends Controller
{
    //
    public function register()
    {
   		
   		// return '111';
   		 return	view('home.register.register');
    }

    public function doRegister(Request $request)
    {
    	// dd($request -> all());
    	$data = $request -> except('_token','repassword');
    	$data['remember_token'] = str_random(70);
    	$data['password'] = Crypt::encrypt($data['password']);
    	$time = time();
    	$data['registtime'] = $time;
    	
    	 $res = DB::table('users') -> insertGetId(['username'=>$data['username'],'password'=>$data['password'],'remember_token'=>$data['remember_token'],'phone' => $data['phone']]);

    	 // dd($res);24
    	 if($res)
    	 {
    	 	// $user_id = $res
    	 	$ures = DB::table('userdetails') -> insert(['user_id' => $res,'sex' => $data['sex'],'year' => $data['year'],'month' => $data['month'],'day' => $data['day'],'city' => $data['city'],'province' => $data['province'],'marray' => $data['marray'],'height' => $data['height'],'education' => $data['education'],'income' => $data['income'],'introduce' => $data['introduce'],'registtime' =>$data['registtime']]);
    	 	if($ures)
    	 	{
    	 		return redirect('/home/login') ->with(['info' => '注册成功']);
    	 	}else{

    	 		return back() -> with(['info' => '请重新注册']) ;
    	 	}

    	 	return redirect('/home/login') -> with(['info' => '注册成功']);
    	 }else{


    	 	return back() -> with(['info' => '请重新注册']);
    	 }



    }

    // public function login()
    // {
    // 	return '登录页面';
    // }
}
