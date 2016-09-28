@extends('admin.layout')
@section('content')
		    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
                <small>编辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">用户管理</a></li>
                <li class="active">编辑</li>
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
                            <h3 class="box-title">快速编辑用户</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                       

						<!-- @if(session('name'))
						<div class="alert alert-danger alert-	dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                    <h4><i class="icon fa fa-ban"></i> 	
		                    警告
		                    </h4>
		                    {{session('name')}}
                 		 </div>
						@endif -->
						
						@if (count($errors) > 0)
						    <div class="alert alert-danger">
						        <ol>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ol>
						    </div>
						@endif


                        <form role="form" action ="{{url('/admin/user/update')}}" method='post'>
                   		{{csrf_field()}} 
                        <input type = 'hidden' name = 'id' value ="{{$data -> user_id }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">用户名</label>
                                    <input type="text" name="username" value="{{$data->username}}" class="form-control" id="exampleInputEmail1"
                                           placeholder="请输入6-18位用户名">
                                </div>
                                
                               
                               <div class="form-group">
                                    <label for="exampleInputPassword1">邮　箱</label>
                                    <input type="text" name="email"  value="{{$data ->email}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入您的邮箱">
                                </div>

								 <div class="form-group">
                                    <label for="exampleInputPassword1">手机号</label>
                                    <input type="text" name="phone"  value="{{$data ->phone}}" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入11位手机号">
                                </div>
                                           
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">更新</button>
                            </div> 

                            <div class="box-footer">
                                <button type="submit" name ='reset' class="btn btn-default">重置</button>
                            </div>
                        </form>
                    </div><!-- /.box -->

                    

                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    		

@endsection
