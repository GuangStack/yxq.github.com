<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use DB;
use Crypt;

class ResetController extends Controller
{
    //
     //加载模板
    public function forget()
    {
    	// return 'forget password';
    	return view('admin/reset/forget');
    }
	//发送邮件的方法
    public function sendEmail(Request $request)
    {
    	// dd($request -> all());
    	$data = $request ->except('_token');
    	// dd($data);

  //   	Mail::raw('这是一封来自于一线牵网站的邮件', function($message) 
  //   	{
    
		// 	$message -> subject('找回密码');
		// 	$message -> to('495200857@qq.com');


		// });

    	$res = DB::table('admins') -> where('email',$data['email'])
    	       -> first();

    	  
    	   if(!$res)
    	   {
    	   	return back() -> with(['info' => '您输入的邮箱不存在']);
    	   }    
    	  
    	       $sus = Mail::send('emails.resetPass',['res' => $res],function($message)use($res){
    	   		$message -> subject('一线牵找回密码');			
    	   		$message -> to($res ->email);


    	   });
           
            if($sus)
            {
                return view('admin.reset.info',['info' => '发送成功']);
            }
    }


    public function newPass($id,$token)
    {

        $res = DB::table('admins') 
                -> where('id',$id)
                -> where('remember_token',$token)
                ->first();


        if(!$res)
        {
            return view('admin.reset.info') ->with(['info' =>'不合法']);
        }else{


            return view('admin.reset.inputpass',['res' => $res]);
        }
    }
    public function renew(Request $request)
    {
        $data = $request -> except('_token','repassword');
         // dd($data); 数组

        $this ->validate($request,[

            'repassword' => 'required|same:password'

            ],[
                'repassword.required' => '确认密码不能为空',
                'repassword.same' => '两次密码不一致'

            ]);

        $data['password'] = Crypt::encrypt($data['password']);
       $res = DB::table('admins') -> where('id', $data['id'] ) -> update($data);

       if($res)
       {
            return redirect('admin/login');
       }else{

            return back() -> with(['info' => '修改密码失败']);
       }
    }

}
