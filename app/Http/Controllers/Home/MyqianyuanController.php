<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MyqianyuanController extends Controller
{
    //

    public function index()
    {
    	// $data = DB::table('users') -> where('user_id', 4) -> first();
    	// dd($data);
    	// $see = DB::table('seeme') -> where('user_id', 4) -> get();
    	$see = DB::select('select distinct(uid) from seeme where user_id=:id', ['id' => 4]);
    	if($see)
    	{
    		$arruid = array();
    		foreach ($see as $k => $v) 
    		{
    			$arruid[] = $v -> uid;
	    	}
	    	// dd($arruid);
	    	$data = array();
	    	foreach ($arruid as $k => $v) 
	    	{
	    		$data[] = DB::table('userphoto') -> select('user_id', 'age', 'img') -> where('user_id', $v) -> first() ;

	    	}
	    	// dd($data);      // 5    6	
    	}

    	$concern = DB::select('select distinct(concern_id) from concern where user_id=:id', ['id' => 4]);
    	// dd($concern);
    	if($concern)
    	{
    		$arruid = array();
    		foreach ($concern as $k => $v) 
    		{
    			$arruid[] = $v -> concern_id;
	    	}
	    	//dd($arruid);
	    	$dataconcern = array();
	    	foreach ($arruid as $k => $v) 
	    	{
	    		$dataconcern[] = DB::table('userphoto') -> select('user_id', 'age', 'img') -> where('user_id', $v) -> first() ;

	    	}
	    	//dd($dataconcern);
    	}

    	// 今日推荐
    	$userall = DB::table('userphoto') -> select('user_id') -> get();
    	// dd($userall);
    	$uidall = array();
    	foreach ($userall as $k => $v) 
    	{
    		$uidall[] = $v -> user_id;
    	}
    	// dd($uidall);
    	$uids = array_rand($uidall, 4);
    	// dd($uids);
    	$uidss = array();
    	foreach ($uids as $k => $v) 
    	{
    		$uidss[] = $uidall[$v];
    	}
    	// dd($uidss);
    	foreach ($uidss as $k => $v) 
    	{
    		$today[] = DB::table('userphoto') -> select('user_id', 'age', 'img') -> where('user_id', $v) -> first() ;
    		// $today[] = DB::select('select user_id, age, img from userphoto where user_id=:id and user_id is not null', ['id' => $v]);

    	}
    	// dd($today);

    	// juguang
    	$userall = DB::table('userphoto') -> select('user_id') -> get();
    	// dd($userall);
    	$uidall = array();
    	foreach ($userall as $k => $v) 
    	{
    		$uidall[] = $v -> user_id;
    	}
    	// dd($uidall);
    	$uids = array_rand($uidall, 6);
    	// dd($uids);
    	$uidss = array();
    	foreach ($uids as $k => $v) 
    	{
    		$uidss[] = $uidall[$v];
    	}
    	// dd($uidss);
    	foreach ($uidss as $k => $v) 
    	{
    		$juguang[] = DB::table('userphoto') -> select('user_id', 'age', 'img') -> where('user_id', $v) -> first() ;
    		// $today[] = DB::select('select user_id, age, img from userphoto where user_id=:id and user_id is not null', ['id' => $v]);

    	}

    	// 一键钟情
    	$userall = DB::table('userphoto') -> select('user_id') -> get();
    	// dd($userall);
    	$uidall = array();
    	foreach ($userall as $k => $v) 
    	{
    		$uidall[] = $v -> user_id;
    	}
    	// dd($uidall);
    	$uids = array_rand($uidall);
    	// dd($uids);
    	$uidss = $uidall[$uids];
    	// dd($uidss);
    	$firstSee = array();
    	$firstSee['username'] = DB::table('users') -> where('user_id', $uidss) -> first() -> username;
    	// dd($firstSee['username']);
    	$firstSee['age'] = DB::table('userphoto') -> where('user_id', $uidss) -> first() -> age;
    	$firstSee['img'] = DB::table('userphoto') -> where('user_id', $uidss) -> first() -> img;
    	// dd($firstSee['age']);
    	$firstSee['income'] = DB::table('userdetails') -> where('user_id', $uidss) -> first() -> income;
    	$firstSee['detail'] = DB::table('userdetails') -> where('user_id', $uidss) -> first() -> introduce;
    	// dd($firstSee['sal']);
    	$firstSee['height'] = DB::table('userdetails') -> where('user_id', $uidss) -> first() -> height;
    	$firstSee['uid'] = $uidss;
    	// dd($firstSee);

    	//收件箱
    	// $receive = DB::table('msg') -> where('user_id', 0) -> orWhere('user_id', 4) -> where('read', 0) -> get();
    	$countreceive = DB::table('msg') -> where('user_id', 0) -> orWhere('user_id', 4) -> where('read', 0) -> count();
    	// dd($countreceive);
    	
    	return view('home.myqianyuan.index1', ['data' => $data, 'dataconcern' => $dataconcern, 'today' => $today, 'juguang' => $juguang, 'firstSee' => $firstSee, 'countreceive' => $countreceive]);
    	// dd($see);
    	
    }

    // today more
    public function match()
    {
    	return view('home.myqianyuan.match');
    }

    // view more information
    public function more()
    {
    	return view('home.myqianyuan.more');
    }

    public function details($id)
    {

    }
}
