@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                加盟管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">加盟管理</a></li>
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
                            <h3 class="box-title">添加加盟商</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <form role="form" action="{{ url('/admin/join/insert') }}" method="get">
                        	{{csrf_field()}}
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
                                    <label for="exampleInputEmail1">城市</label>
                                    <input type="text" class="form-control" value="{{old('city')}}" name="city" id="exampleInputUsername"
                                           placeholder="请输入城市名">
                                </div>
                                
                                
                               <div class="form-group">
                                    <label for="exampleInputEmail1">姓名</label>
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name" id="exampleInputUsername"
                                           placeholder="请输入加盟商家名">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">手机号</label>
                                    <input type="text" class="form-control" value="{{old('phone')}}" name="phone" id="exampleInputUsername" placeholder="请输入手机号">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">加盟原因</label>
                                    <input type="text" class="form-control" value="{{old('reason')}}" name="reason" id="exampleInputUsername" placeholder="请输入加盟原因">
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

    
@endsection('content')