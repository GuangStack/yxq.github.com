<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MsgController extends Controller
{
    //未读
    public function index()
    {
    	$datamsg = DB::table('msg')
    	-> select('msg.*','userdetails.*', 'userphoto.*')
    	-> join('userdetails', 'userdetails.user_id', '=','msg.send_id' )
    	-> join('userphoto', 'userphoto.user_id', '=', 'msg.send_id')
    	-> where('msg.user_id', 4) 
    	-> where('msg.read', '0') 
    	-> get();

    	// $msgid = DB::table('msg') -> where('')
    	// dd($datamsg);
    	// $allsend = array();
    	// foreach ($datamsg as $k => $v) 
    	// {
    	// 	$allsend[] = $v -> send_id;
    	// }
    	// dd($allsend);
    	// // $allsend = array_unique($allsend);
    	// // dd($allsend);
    	// $alldata = array();
    	// foreach ($allsend as $k => $v) 
    	// {
    	// 	$alldata = DB::table('userdetails') -> where('user_id', $v) -> first();
    	// 	// $alldata['content'] = 
    	// }



    	// dd($datamsg);
    	// dd($alldata);
    	return view('home.msg.index',['datamsg' => $datamsg]);
    }

    public function detail()
    {
    	return view('home.msg.details');
    }

    // 已读信息
    public function inbox()
    {
    	$datamsg = DB::table('msg')
    	-> select('msg.*','userdetails.*', 'userphoto.*')
    	-> join('userdetails', 'userdetails.user_id', '=','msg.send_id' )
    	-> join('userphoto', 'userphoto.user_id', '=', 'msg.send_id')
    	-> where('msg.user_id', 4) 
    	-> where('msg.read', '1') 
    	-> get();

    	return view('home.msg.inbox', ['datamsg' => $datamsg]);
    }

    // 已发信息
    public function outbox()
    {
    	$datamsg = DB::table('msg')
    	-> select('msg.*','userdetails.*', 'userphoto.*')
    	-> join('userdetails', 'userdetails.user_id', '=','msg.user_id' )
    	-> join('userphoto', 'userphoto.user_id', '=', 'msg.user_id')
    	-> where('msg.send_id', 4) 
    	-> get();

    	// dd($datamsg);

    	return view('home.msg.outbox', ['datamsg' => $datamsg]);
    }

    public function admin()
    {
    	$datamsg = DB::table('msg')
    	-> select('msg.*','userdetails.*', 'userphoto.*')
    	-> join('userdetails', 'userdetails.user_id', '=','msg.user_id' )
    	-> join('userphoto', 'userphoto.user_id', '=', 'msg.user_id')
    	-> where('msg.user_id', 4)
    	-> where('msg.send_id', 0)
    	-> get();
    	// dd($datamsg);
    	return view('home.msg.admin', ['datamsg' => $datamsg]);    	
    }

    public function post()
    {
    	return view('home.msg.post');
    }

    public function dopost()
    {
    	return 111;
    }

    public function send()
    {
        return view('home.msg.send');
    }

    public function ajaxSend(Request $request)
    {
        $msg = $request -> input('msg');
        // $data = array();
        // $data['user_id'] = 4;
        // $data['send_id'] = 6;
        // $data['content'] = $msg;
        // $data['time'] = time();
        // $res = DB::table('msg') -> insert($data);
        // if($res)
        // {
        //     return response() -> json('0');
        // }else
        // {
        //     return response() -> json('1');
        // }

        // DB::table('users')->insert(['email' => 'john@example.com', 'votes' => 0]);

        $res = DB::table('msg') -> insert(['user_id' => 4, 'send_id' => 6, 'content' => $msg]);
        if($res)
        {
            return response() -> json('0');
        }else
        {
            return response() -> json('1');
        }
    }

    public function homee()
    {
        return phpinfo();
    }
}
