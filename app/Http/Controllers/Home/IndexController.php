<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    //index
    public function index()
    {
    	$data = DB::table('lunbo') -> where('id',1) -> first();
    	$request = DB::table('success') -> get();
    	$result = DB:: select("select u.user_id,u.age,u.img,ud.sex,ud.height,ud.user_id,ud.id,ud.province,ud.realname,ud.education,ud.introduce
 from userphoto as u  JOIN userdetails as ud on u.user_id = ud.user_id
");
    
    	//dd($result);
    	//dd($request);
    	return view('home.index.index',['data' => $data,'request' => $request,'result' => $result]);
    }

    public function ajaxSuccess(Request $request)
    {
    	// dd($request -> all());
    	$type =$request -> input('type');
    	$data = DB::select('select * from success where type=? limit 0,5',[$type]);
    	// $content = json_encode($data);
    	return response() -> json($data);
    }


    public function select(Request $request)
    {
    	//
    	// dd($request -> all());
    	$sex = $request -> input('sex');
    	$minage = $request -> input('min_age'); 
    	$maxage = $request -> input('max_age');
    	$str="";
    	if ($maxage != 0){
    		$str= "and u.age <= $maxage ";
    	}

//     	$data = DB::table('topic AS t')
//                 ->select('t.title','t.content','t.uid','t.id','p.ctime','p.user_id','p.content','uu.username','p.topic_id','p.id')
//                 ->leftJoin('post AS p','t.id' ,'=','p.topic_id')
//                 ->leftJoin('users AS uu','p.user_id','=','uu.user_id')
//                 ->where('p.topic_id',$id)
//                 ->get();
    	//查询数据
    	$data = DB:: select("select u.user_id,u.age,u.img,ud.sex,ud.height,ud.income,ud.user_id,ud.id,ud.province,ud.realname,ud.education,ud.introduce
 from userphoto as u  JOIN userdetails as ud on u.user_id = ud.user_id where u.age >= $minage $str and ud.sex = $sex;
");
    	//dd($data);
    	// $data = DB::table('userdetails AS ud')
    		
    	// 	-> JOIN('userphoto AS u' ,'u.user_id ','=','ud.user_id')
    	// 	-> where('u.age', 'between', $minage, 'and', $maxage)
    	// 	-> where('ud.sex',$sex)
    	// 	-> select('ud.sex','ud.height','ud.sal','ud.id','ud.user_id','u.age','u.img')
    	// 	-> get();

    	return  redirect('/home/index/index',['data' => $data]);
    }




    public function ajaxSearch(Request $request)
    {
 //    	$result = DB::select("select u.user_id,u.age,u.img,ud.sex,ud.height,ud.income,ud.user_id,ud.id,ud.province,ud.realname,ud.education,ud.introduce
 // from userphoto as u  JOIN userdetails as ud on u.user_id = ud.user_id ");
 //    	// dd($result);
 //    	return response() -> json($result);
    }


}
