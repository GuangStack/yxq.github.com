<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
use DB;
  
class UserController extends Controller
{
    //add方法
    public function add()
    {
        return view('admin.user.add');
    }
   
    public function insert(Request $request)
    {
        // dd($request -> all());
        // 判断用户名
        // if(!$request['username'])
        // {
        //  return back() -> with(['name' =>'用户名不能为空']);
        // }

         $this ->validate($request, [

              'username' => 'required',
                'email' => 'required|email',
                // 'phone' =>'required',
                // 'phone' =>'max:11|min:11',
                'password' =>'required',
                'repassword' => 'required|same:password'


            ],[

                'username.required' => '用户名不能为空',
                'email.required' => '邮箱不能为空',
                'email.email' => '邮箱格式不正确',
                // 'phone.required' => '不能为空手机号',
                // 'phone.max' => '手机号必须为11位',
                // 'phone.min' => '手机号必须为11位',
                'password.required' =>'密码不能为空',
                'repassword.required' =>'确认密码不能为空',
                'repassword.same' =>'密码不一致'

            ]);



        //处理数据
        $data = $request -> except('_token','repassword');
        // dd($data);
        
        //加密密码
        $data['password'] = Crypt::encrypt($data['password']);  
        // dd($data);
        $data['remember_token'] = str_random(70);
        // $time = date('Y-m-d H:i:s');

        //添加数据
        $res = DB::table('users') -> insertGetId($data);
        // dd($res);
        if($res>0)
        {
            $user_id=$res;
            $rres = DB::table('userdetails')->insert(['user_id'=>$user_id]);
            if($rres)
            {
                return redirect('admin/user/index') -> with(['info'=>'添加成功']);
            }else
            {
                return redirect('admin/user/add') -> with(['info' => '添加失败']);
            }
           
          return redirect('admin/user/index') -> with(['info'=>'添加成功']);
        }else{

            return redirect('admin/user/add') -> with(['info' => '添加失败']);
        }

    }

    //index
    public function index(Request $request)
    {   //查询
        $num = $request -> input('num',10);

        $data = DB::table('users') 
            ->where(function($query) use($request){
                $query->where('username','like','%'.$request ->input('keyword').'%');
            })
          
            -> paginate($num);

      
        return view('admin.user.index',
            ['data' => $data,'request' => $request ->all()]);

    }

    //编辑

    public function edit($id)
    {
        //查询数据库
        $data = DB::table('users') -> where('user_id',$id) -> first();
        // dd($data);
        return view('admin.user.edit',['data'=> $data ]);

    } 
    public function update(Request $request)
    {
        // dd($request -> all());
        $this ->validate($request, [

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


        $data = $request ->except('_token','id');
        // $data['updated_at'] =date('Y-m-d H:i:s');

        //执行更新
       $res = DB::table('users') -> where('user_id',$request ->input('id'))->update($data);
        //判断
        if($res)
        {
            return redirect('admin/user/index') -> with(['info'=>'更新成功']);
        }else
        {
            return back() -> with(['info' => '更新失败']);
        }


    }

    public function delete($id)
    {

        $res = DB::table('users') -> where('user_id', $id) -> delete();
        if($res)
        {
            return redirect('admin/user/index') ->with(['info' =>'删除成功']);
        
        }else
        {

            return redirect('admin/user/index') ->with(['info' =>'删除失败']);
        }
    }


    public function ajaxUpdate(Request $request)
    {

        // return response() -> json(0);
        $id = $request -> input('id');
        // echo $id;
        $data = DB::table('users') ->where('id',$id)->first();
        if($data -> status == '0')
        {
           $res = DB::table('users') ->where('id',$id) -> update(['status'=> 1]);
            if($res)
            {
                return response() ->json(0);
            }
            else
            {
                return response() ->json(1);
            }

        }else
        {
         $res = DB::table('users') ->where('id',$id) -> update(['status'=> 0]); 

         if($res)
            {
                return response() ->json(2);
            } else
            {
                return response() ->json(3);
            } 
         
        }
    }
    public function ajaxUsername(Request $request)
    {

       // $id = $request ->input('id');
        $name = $request -> input('username');

       $res = DB::table('users') ->where('username',$name) ->first();

       if($res)
       {    //1 表示用户已经存在
            return response() -> json(1);
       }else{


            $res = DB::table('users') 

            ->where('id',$request ->input('id') )

             -> update(['username' => $name]);


                if($res)
                {   //0表示修改成功
                    return response()-> json(0);
                }else{

                    //2表示修改失败
                     return response() -> json(2);

                }
           

       }
       



    }
}
