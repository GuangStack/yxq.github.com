@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                站内信管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">站内信管理</a></li>
                <li class="active">添加</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">添加站内信</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <form role="form" action="{{ url('/admin/msg/insert') }}" method="post">
                        	{{ csrf_field() }}
                            <div class="box-body">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissable">
			                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			                    <h4>警告！</h4>
			                    	<ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							 
								
			                  </div>
							@endif
			                 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">管理员编号</label>
                                    <input type="text" class="form-control userid" value="{{old('send_id')}}" name="send_id" id="exampleInputUsername"
                                           placeholder="请输入管理员编号">
                                </div>
                                <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="exampleInputEmail1">发送用户的编号, 多个用户用逗号(,)分隔</label>
                                    <input type="text" class="form-control" value="{{old('user_id')}}" name="user_id" id="exampleInputUsername"
                                           placeholder="请输入用户编号 1,2,3,4">
                                </div>
                                
                                <div style="margin-top: 20px;margin-left: -20px;" class="form-group col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked="" id="selectall" name="all">
                                            所有用户
                                        </label>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">发送内容</label>
                                    <input type="text" class="form-control" value="{{old('content')}}" name="content" id="exampleInputUsername"
                                           placeholder="请输入发送内容">
                                </div>
                                
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col (left) -->

            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <script type="text/javascript">       
        window.onload = function(){
            // // alert($('#selectall').val());   // on
            // $('#selectall').on('click',function(){
            //     if($(this).attr('checked') == 'checked')
            //     {
            //         alert('111111111111');
            //     }
            // });
            // $.ajaxSetup({
            //         headers:{
            //             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            // $('.userid').on('blur',function(){
            //         var id = $(this).val();
            //         $.post('/admin/recharge/getUser',{id:id},function(data){
            //                     if(data == '0')
            //                     {
            //                         alert('用户不存在');
            //                     }                                                   
            //         },'json');
            //     });
        }
    </script>
    
@endsection('content')