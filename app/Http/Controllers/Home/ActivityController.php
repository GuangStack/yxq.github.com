<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class ActivityController extends Controller
{
    //
    public function index()
    {
    	$data = DB::table('activity') -> where('style',0) -> get();
    	// dd($data);

    	return view('home.activity.index',['data' => $data]);


    }
}
