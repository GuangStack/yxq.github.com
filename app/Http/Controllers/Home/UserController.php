<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Crypt;
class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        // $data =DB::table('userdetails') -> where('user_id',session('user')->user_id) -> first();

     //    $res =DB::table('users') -> where('user_id',session('user')->user_id) -> first();
        
        $data = DB::table('users')

             -> join('userdetails','users.user_id','=','userdetails.user_id')
             
             -> where('users.user_id',session('user') -> user_id)

             -> first();
         // dd($data);

        // $data = DB::select(select * from users userdetails where user_id = $session);
        // dd($data);
        
        return view('home.user.index',['data' => $data]);

    }


    public function wanshan()
    {

             $data = DB::table('users')

             -> join('userdetails','users.user_id','=','userdetails.user_id')
             
             -> where('users.user_id',session('user') -> user_id)

             -> first();

        return view('home.user.wanshan',['data'=> $data]);

    }
    public function insert(Request $request)
    {
          // dd($request -> input('id'));
        $data = $request -> except('_token','id');
        // dd($data);
        $res = DB::table('userdetails') -> where('user_id',$request -> input('id')) -> update($data);
        // dd($res);
        if($res)
        {
            return redirect('home/user/index') -> with(['info' => '恭喜完善资料成功']);
        }else{

            return back() -> with(['info' => '添加失败']);
        }

    }

   
    public function update(Request $request)
    {
        $data = DB::table('userdetails') -> where('user_id',session('user')->user_id ) -> first();

        return view('home.user.update',['data' => $data]);
    }
    

    public function doUpdate(Request $request)
    {
        // $data = $request -> all();
        // dd($data);数组
        $data = $request -> except('_token');
       // dd($data);
        $res = DB::table('userdetails') -> where('user_id',$data['id']) -> update(['education' => $data['education'],'marray' => $data['marray'], 'children' => $data['children'],'blood' => $data['blood'] ,'nation' => $data['nation'],'income' => $data['income'],'house' =>$data['house'],'car' => $data['car'],'realname'=>$data['realname'],'qq'=>$data['qq'],'address' => $data['address']]);
        if($res)
        {   
            $ures = DB::table('users') -> where('user_id',$data['id']) -> update(['username' =>$data['username']]);
            if($ures)
             {
                return redirect('home/user/index') -> with(['info' => '修改成功']);
             }else{

                return back() -> with(['info' => '修改失败']);
             }
            return redirect('home/user/index') -> with(['info' => '修改成功']);
        }else{
            return back() -> with(['info' => '请重新输入']);
        }
    }

    public function password($id)
    {
            // return 'aaa';
        $data = DB::table('userdetails') -> where('user_id',$id)  -> first();
        // dd($data);

        return view('home.user.password',['data' => $data]);



    }

    public function updatepass(Request $request)
    {
        // dd($request -> all());
        $data = $request -> except('_token');
        
        if($data['password'] == $data['repassword'])
        {
            $data['password'] = Crypt::encrypt($data['password']);
            // dd($data['password']);

        }else{

            return back() -> with(['info' => '密码不一致']);
        }

        $res = DB::table('users')
                 -> where('user_id',$data['id']) 
                -> update(['password' =>$data['password']]);
       
        if($res)
        {
            return redirect('home/user/index') -> with(['info' => '修改成功']);
        }else{

            return bakc() -> with(['info' => '请重新填写']);
        }
 
    }

    public function photo()
    {
        return view('home.user.photo');
    }
}

