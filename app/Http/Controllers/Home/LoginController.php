<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Crypt;
class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login.login');


    }

    public function doLogin(Request $request)
    {
    	// dd(111);
    	$data = $request -> except('_token');
    	// dd($data);
    
    	$res = DB::table('users') -> where('phone',$data['phone']) -> first();
    	// dd($res);
    	//数据库里面的密码


    	$password = Crypt::decrypt($res -> password);
    	// dd($password);123456

    	if($data['password'] == $password)
    	{	
    		session(['user' => $res]);
            
    		$res -> ip = $_SERVER['REMOTE_ADDR'];
    		$sres = DB::table('session') -> insert(['user_id' => $res -> user_id,'ip' => $res -> ip]);
    			if($sres)
    			{
    				return redirect('home/index/index') -> with(['info' => '登录成功']);
    			}else{

    				return back() -> with(['info' =>'111']);
    			}

    		return redirect('home/index/index') -> with(['info' => '登录成功']);

    	}else{

    		return back() -> with(['info' =>'密码或账号不符']);
    	}

    


    }
}
