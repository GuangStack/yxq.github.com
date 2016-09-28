
@extends('admin.layout')
@section('content')


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               标签管理
                <small>编辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">标签编辑</a></li>
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
                            <h3 class="box-title">快速编辑标签</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                         
                        <form role="form" action=" {{ url('/admin/types/update') }}" method="post">
                        	{{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $data -> id }}">
                        	@if(count($errors) > 0)
                        	<div class="alert alert-danger">
                    			<ul>
                    				@foreach($errors -> all() as $error)
                    				<li>{{ $error }}</li>
                    				@endforeach
                    			</ul>
                 			</div>
                 			@endif
                 			
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">标题名</label>
                                    <input type="text" name="name" value="{{ $data -> name }}" class="form-control" id="exampleInputEmail1"
                                           placeholder="请输入新的标签名">
                                </div>
                                
                                
                               
                                
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">更新</button>
                                <button type="reset" class="btn btn-default">重置</button>
                            </div>
                        </form>
                    </div><!-- /.box -->

                   
                      

                </div><!--/.col (left) -->
                <!-- right column -->
               
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection