<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Redis;
use success\index;
class SuccessController extends Controller
{
    //index
    public function index()
    {
    	// return 1111;
    	// function result($num){

    	// 	 $d = DB::select('select * from success limit ?,?',[$num,$num+5]);
    	// 	dd($d);
    	// }
    	
    	//查询数据
    	$data = DB::table('success') -> get();
    	//dd($data);
    	//select count(*) from success 
    	$res = DB::table('success') -> count();
    	//dd($res);
    	$result = ceil($res / 6);
    	//$s=[];
    	// for ($i=0;$i<$result1;$i++){
    	 	//$m=result(0);
    	// 	$s+=$m;

    	// }
    	//dd($res);
    	//dd($result);
    	//dd($data);
    	return view('/home/success/index',['data' => $data,'result'=> $result,'res'=> $res]);
    }

    public function detail($id)
    {
    	//查询数据
    	$data = DB::table('success') -> where('id',$id) -> first();
    	//dd($data);
    	return view('home.success.detail',['data' => $data]);
    }

   


}
