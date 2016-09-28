<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    //
	public function index()
	{
		return view('home.search.index');
	}

	public function search(Request $request)
	{
		// dd($request -> all());
	}

	public function getdata()
	{
		$data = DB::table('userdetails') 
			-> join('users', 'userdetails.user_id', '=', 'users.user_id') 
			-> join('userphoto', 'userphoto.user_id', '=', 'userdetails.user_id')
			-> get();
		
		$jsondata = json_encode($data);
		echo $jsondata;
	}

	public function getdataa()
	{
		$data = DB::table('userdetails') 
			-> join('users', 'userdetails.user_id', '=', 'users.user_id') 
			-> join('userphoto', 'userphoto.user_id', '=', 'userdetails.user_id')
			-> where('userdetails.sex', '1')
			-> get();
		// dd($data);
		$jsondata = json_encode($data);
		echo $jsondata;
	}
}
