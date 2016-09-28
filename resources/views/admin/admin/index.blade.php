@extends('admin.layout')
@section('content')
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               管理员管理
                <small>列表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台</a></li>
                <li><a href="#">管理员管理 `</a></li>
                <li class="active">列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">快速查看管理员列表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        @if(session('info'))
                        <div id ='showhidden' class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>    <i class="icon fa fa-check"></i> 提示!</h4>
                            {{session('info')}}

                           @endif
                         </div>
                         <script type="text/javascript">
                            
                            window.onload = function(){

                                $('#showhidden').hide(1000);
                            }
                
                         </script>
                           
                             <div class = "row">
                               <form action ="{{url('admin/admin/index')}}" method="get">
                         

                                    <div class = 'col-md-4'>
                                        
                                        <select  name ="num" class="form-control">
                                            <option value="10"
                                                @if(!empty($request['num']) && $request['num'] == 10)
                                                    selected ='selectd'

                                                @endif >
                                                10

                                            </option>
                                            <option value="20"
                                                    @if(!empty($request['num']) &&
                                                    $request['num'] == 20)
                                                    selected ='selectd'

                                                @endif >

                                            20</option>
                                            <option value="50"
                                                @if(!empty($request['num']) && $request['num']==50)
                                                    selected = 'selected'
                                                @endif

                                            >50</option>
                                            <option value="100"

                                            @if(!empty($request['num']) && $request['num']==100)
                                                    selected = 'selected'
                                                @endif


                                            >100</option>
                                        </select>



                                    </div>

                                    <div class = 'col-md-6 col-md-offset-2'>
                                        
                                        <div class="input-group input-group">
                                            <input class="form-control" name="keyword" type="text">
                                            <span class="input-group-btn">
                                              <button class="btn btn-info btn-flat">搜索</button>
                                            </span>
                                         </div>

                                   </div>
                              </form>



                           </div>
                          
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>真实姓名</th>
                                    <th>用户名</th>
                                    <th>头 像</th>>
                                    <th>权 限</th>
                                    <th>登录IP</th>
                                    <th>手机号</th>
                                    <th>邮 箱</th>
                                    <th>现住地</th>
                                    <th>操作 |删除</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $admins )
                                <tr>
                                    <td >{{$admins ->id}}</td>
                                    <td name = 'realname'>{{$admins -> realname}} </td>
                                    <td name = 'username'>{{$admins -> username}} </td>
                                   <td><img  width ='80px'src="{{$admins ->img }}"></td>
                                    <td name = 'auth' class = 'ids'>

                                      @if($admins -> auth == '0')
                                      超级管理员
                                      @endif

                                      @if($admins -> auth == '1')
                                      普通管理员
                                      @endif
                                    




                                    </td>
                                  <td name = 'ip'>{{$admins -> lastip}}</td>
                                    <td name = 'phone'>{{$admins -> phone}}</td>
                                    <td name = 'emails'>{{$admins -> email}}</td>
                                    <td name = 'address'>{{$admins -> address}}</td>
                                    

                                   

                                    <td>
                                    <a href="{{url('/admin/admin/edit')}}/{{$admins->id}}">编辑</a>
                                        
                                     <a href="{{url('/admin/admin/delete')}}/{{$admins->id}}">删除</a>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                               
                            </table>    
                        
                         {!! $data->render() !!}
    
        
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <script type="text/javascript">
        
        window.onload =function()
        {

            // alert($);
            //使用ajax 用Post提交要先设置头信息在layout里面设置
                  
            $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
             });

            //添加事件
            $('.lang').on('click',function(){

                  // alert(111);
                  var lang =$(this);
                  var id = $(this).parent().find('.ids').html();
                    // alert(111);
                  $.post('/admin/user/ajaxUpdate',{id:id},function(data){
                        // alert(data);
                        if(data =='0')
                        {
                           lang.html('禁用');
                        }else if(data==2)

                        {
                            lang.html('启用');

                        }else if(data =='3')
                        {
                            lang.html('启用');
                        }else{

                            lang.html('禁用');
                        }





                  },'json');

                  

            });

            //双击修改用户
            $('td[name = username]').on('dblclick',function(){
                var td =$(this);
                var id = td.prev().html();
                var username = td.html();
                var inp =$('<input type = "text"/>');
                inp.val(username);
                //将表单放入到td中.
                td.html(inp);
                //双击鼠标选中input里面的值


                inp.select();
                //失去焦点事件
                inp.blur(function(){
                    //获取新修改的值
                    var newname = inp.val();

                     if(username == newname)
                         {
                            alert('无效的操作');
                             td.html(username);
                            return;
                         }

                    //发送ajax
                    $.post('/admin/user/ajaxUsername',{id:id,username:newname},function(data){

                         if(data =='1')
                         {
                            alert('用户名已存在');
                            td.html(username);
                         }
                         else if(data =='0')
                         {
                           
                            td.html(newname);

                         }else{

                            alert('用户名修改失败');
                            td.html(username);

                         }


                    },'json');




                });





            });
        }



    </script>




@endsection
