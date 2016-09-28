@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                好友关系管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">好友管理</a></li>
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
                            <h3 class="box-title">添加好友</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <form role="form" action="{{ url('/admin/friend/insert') }}" method="post"
                        >
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
                                    <label for="exampleInputEmail1">用户编号</label>
                                    <input type="text" class="form-control" value="{{old('user_id')}}" name="user_id" id="exampleInputUsername"
                                           placeholder="请输入用户编号">
                                </div>
                                <div class="form-group">
                                    <label>关系类型</label>
                                    <select class="form-control" name="type">
                                        <option value="好友">好友</option>
                                        <option value="关注">关注 ta </option>
                                        <option value="被关注">被 ta 关注</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> ta 的编号</label>
                                    <input type="text" class="form-control" value="{{old('friendid')}}" name="friendid" id="exampleInputUsername"
                                           placeholder="请输入 ta 的编号">
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