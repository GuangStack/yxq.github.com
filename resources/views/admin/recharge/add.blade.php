@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                充值管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">充值管理</a></li>
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
                            <h3 class="box-title">添加充值记录</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <form role="form" action="{{ url('/admin/recharge/insert') }}" method="post">
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
                                    <label for="exampleInputEmail1">用户编号</label>
                                    <input type="text" class="form-control userid" value="{{old('user_id')}}" name="user_id" id="exampleInputUsername"
                                           placeholder="请输入用户编号">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">充值金额</label>
                                    <input type="text" class="form-control" value="{{old('money')}}" name="money" id="exampleInputUsername"
                                           placeholder="请输入充值金额">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">购买心值数</label>
                                    <input type="text" class="form-control" value="{{old('love')}}" name="love" id="exampleInputUsername"
                                           placeholder="请输入心值数">
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
            // alert($);
            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
            $('.userid').on('blur',function(){
                    var id = $(this).val();
                    $.post('/admin/recharge/getUser',{id:id},function(data){
                                if(data == '0')
                                {
                                    alert('用户不存在');
                                }                                                   
                    },'json');
                });
        }
    </script>
    
@endsection('content')