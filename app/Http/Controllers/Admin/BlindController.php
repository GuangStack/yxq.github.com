<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class BlindController extends Controller
{
    //
    public function add()
    {
    	return view('admin/blind/add');
    }

    public function insert(Request $request)
    {
    		// dd($request -> all());
    	$data = $request -> except("_token");
    	if ($request->hasFile('img'))
	    	{
	    
		    	 if ($request->file('img')->isValid()) 
		    	 {
		    	 	 //获取图片的后缀名
	       				$suffix = $request -> file('img') -> getClientOriginalExtension();
	       				//随机名称
	       				$filename = time().mt_rand(10000,99999).'.'.$suffix;

	       				$request -> file('img') -> move('./uploads',$filename);

	       				 //处理img字段
	       				$data['img'] = '/uploads/'.$filename;

         			
	       		}
	    	 }

			     
			$res = DB::table('blinds') -> insert($data);
		   
		    if($res)
		    {
		    	
		    	return redirect('admin/blind/details') -> with(['info'=> '添加成功'] );
		   

		    }else{


		    	return back() -> with(['info' => '添加失败']);
		    }
    

    }


    public function details()
    {
    	$data = DB::table('blinds') ->first();
    	// dd($data);

    	 return view('admin.blind.details',['data' => $data]);

    	
    }

    public function edit($id)
    {
    	
    	$data = DB::table('blinds') -> where('id', $id) -> first();
    	 // dd($data);
    	 return view('admin.blind.edit',['data' => $data]);

    }

    public function update(Request $request)
    {
    	// dd($request -> all());

    	// $data = $request -> except('_token');
    	$id = $request -> input('id');
     //旧图片
    	// dd(DB::table('blinds') -> where('id', $id ) ->first());
      $oldImg = DB::table('blinds') -> where('id', $id ) ->first() -> img;
      // dd($oldImg);

      $data = $request -> except('_token','id');
      // dd($data);
      //是否有新的图片上传
      if($request -> hasFile('img'))
      {

          if($request -> file('img') -> isValid())
          {
              //获取图片的后缀名称
              $suffix = $request -> file('img') -> getClientOriginalExtension();
              //获取随机名
              $fileName = time().mt_rand(10000,99999).'.'.$suffix;
              // dd($fileName);
              //移动
                $request ->file('img') ->move('./uploads',$fileName);

                $data['img'] = '/uploads/'.$fileName;
                // dd('.'.$oldImg);
                $su = '';
                if($oldImg)
                {
                	$su = '.'.$oldImg;
                }
              if(file_exists($su))
              {	
              	// dd(22222222);
                unlink('.'.$oldImg);
              }

          }  
      }
      
      $res = DB::table('blinds') -> where('id', $id) -> update($data);
       if($res)
           {
            return  redirect('admin/blind/details') -> with(['info' =>'更新成功']);
           }else{

            return back() -> with(['info' => '更新失败']);

           }

    }
    

}
