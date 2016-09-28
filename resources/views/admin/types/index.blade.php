

@extends('admin.layout')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                标签管理
                <small>列表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">标签管理</a></li>
                <li class="active">列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">快速查看标签列表</h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">

                    <div class="row">
                        <form action="{{ url('admin/User/index')}}" method="get">
                        </form>
                    </div>    
                        @if(session('info'))
                        <div  id="showHidden"class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> 提示!</h4>
                           添加成功
                        </div>
                        @endif
                        <script type="text/javascript">
                        window.onload = function()
                        {
                            $("#showHidden").hide(3000);
                        }
                        </script>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>标签名</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div style="display:none;"> {{$i = 1}}</div>
                               @foreach($data as $type)
                                <tr>
                                    
                                    <td>{{ $i++ }}</td>

                                    <td>
                                    @if($type -> pid !== 0)
                                        {{'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$type -> name }}
                                    @else
                                        {{$type -> name }}
                                    @endif

                                    </td>
                                   
                                    <td>
                                     @if(($type -> pid !== 0) and ($type -> tcount ==0))
                                    <a href="{{ url('/admin/types/edit') }}/{{ $type -> id }}">编辑</a>
                                      |  <a href="{{ url('/admin/types/delete') }}/{{ $type -> id }}">删除</a>
                                    @else
                                        <a href="{{ url('/admin/types/edit') }}/{{ $type -> id }}">编辑</a>
                                    @endif 
                                    </td>
                                </tr>
                              @endforeach
                                
                                
                                
                                
                                </tbody>
                                
                            </table>
                            
                           
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                   
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <script type="text/javascript">
        window.onload = function()
        {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            //添加事件
            $('.lang').on('click',function(){
                var lang = $(this);
                //获取id
                var id = lang.parent().find('.ids').html(); 

                $.post('/admin/User/ajaxUpdate' , {id:id} , function(data){
                    //判断返回的值
                    if(data == '0')
                    {
                        lang.html('禁用');
                    }else if(data == '1')
                    {
                        lang.html('启用');
                    }
                   
                },'json');
            });

           
                
            //双击修改用户名
            $('td[name=name]').dblclick(db);
        
            function db()
            {
                var td = $(this);

                //获取原来的id
                var id = td.prev().html();
                //获取当前里面的值
                var name = td.html();

                var inp = $('<input type="text"/>');
                inp.val(name);

                //将表单放到td内
                td.html(inp);
                //光标自动对焦
                inp.select();

                //失去焦点事件
                inp.blur(function(){
                    //获取新值
                    var newname = inp.val();

                    // if(name = newname)
                    // {
                    //     alert('你脑子有病');
                    //     td.html(name);
                    // }

                    //发送ajax
                    $.post('/admin/User/ajaxUsername',{id:id,name:newname},function(data){
                        // alert(data);

                        if(data == '1')
                        {
                            alert('用户名已经存在');
                            td.html(name);
                        }else if(data == '0')
                        {
                            td.html(newname);
                        }else
                        {
                            alert('用户名修改失败');
                            td.html(name);
                        }
                    },'json');
                    //添加事件
                    td.dblclick(db);
                });
            //清除事件
             td.unbind('dblclick');
            }
             
        }
            
    </script>


@endsection
