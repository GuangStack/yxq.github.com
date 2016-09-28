@extends('admin.layout')
@section('content')
		    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                管理员管理
                <small>编辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">管理员管理</a></li>
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
                            <h3 class="box-title">快速编辑管理员</h3>
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


                    <form role="form" action ="{{url('/admin/admin/update')}}" method='post' enctype ="multipart/form-data">
                   		{{csrf_field()}} 
                        <input type = 'hidden' name = 'id' value ="{{$data -> id }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">用户名</label>
                                    <input type="text" name="username" value="{{$data->username}}" class="form-control" id="exampleInputEmail1"
                                           placeholder="请输入6-18位新用户名">
                                </divenctype ="multipart/form-data"
                               <div class="form-group">
                                    <label for="exampleInputPassword1">邮　箱</label>
                                    <input type="text" name="email"  value="{{$data ->email}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入您的新邮箱">
                                </div>

								 <div class="form-group">
                                    <label for="exampleInputPassword1">手机号</label>
                                    <input type="text" name="phone"  value="{{$data ->phone}}" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入11位新手机号">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">居住地</label>
                                    <input type="text" name="address"  value="{{ $data ->address }}" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入现居住地">
                                    </div>
                                      
                                <div class="form-group">
                                    <label for="exampleInputFile">原头像</label>
                                    <img type = 'file' name = 'oldImg' src="{{ $data -> img }}" width = '200px'>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">修改头像</label>
                                    <input id="exampleInputFile" type="file" name = 'img'>
                                    <p class="help-block">上传新头像</p>
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
