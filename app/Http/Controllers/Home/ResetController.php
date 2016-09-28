<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use DB;
use Crypt;
class ResetController extends Controller
{
    //
    public function forget()
    {
    	return view('home/reset/forget');
    }

    public function sendEmail(Request $request)
    {
    	// dd($request ->all());
    	$data = $request -> except('_token');
    	// dd($data);
   //  	Mail::raw('这是一封来自于一线牵网站的邮件', function($message) 
   //  	{
    
		 // 	$message -> subject('找回密码');
		 // 	$message -> to('495200857@qq.com');


		 // });
    	$res = DB::table('users') -> where('email',$data['email'])
    	       -> first();
    	// dd($res); 
    	 //判断邮箱是否合法有效
    	   if(!$res)
    	   {
    	   	   return back() -> with(['info' => '您输入的邮箱不存在']);
    	   }    
    	  
    	       $sus = Mail::send('home/emails/resetPass',['res' => $res],function($message)use($res){
    	   		$message -> subject('一线牵找回密码');			
    	   		$message -> to($res ->email); });
    }
    	

      public function newPasss($id,$token)
    	{

	        $res = DB::table('users') 
	                -> where('user_id',$id)
	                -> where('remember_token',$token)
	                ->first();
	         // dd($res);
	  if(!$res)
        {
            return view('admin.reset.info') ->with(['info' =>'来源不合法']);
        }else{


            return view('home.reset.resetpass',['res' => $res]);
        }
 	  }
    

    public function donew(Request $request)
    {
        $data = $request -> except('_token','repassword');
         // dd($data); 

        $this ->validate($request,[

            'repassword' => 'required|same:password'

            ],[
                'repassword.required' => '确认密码不能为空',
                'repassword.same' => '两次密码不一致'

            ]);

        $data['password'] = Crypt::encrypt($data['password']);
       $res = DB::table('users') -> where('user_id', $data['user_id'] ) -> update(['password' => $data['password']]);
       
       if($res)
       {
            return redirect('home/login');
       }else{

            return back() -> with(['info' => '修改密码失败']);
       }
    }
           
   
}
