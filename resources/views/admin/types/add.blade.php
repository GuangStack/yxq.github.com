
@extends('admin.layout')
@section('content')


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               板块管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">板块管理</a></li>
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
                            <h3 class="box-title">快速添加板块</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                         
                        <form role="form" action=" {{ url('/admin/types/insert') }}" method="post">
                        	{{ csrf_field() }}
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
                                    <label for="exampleInputEmail1">标签的分类名称</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1"
                                           placeholder="请输入标签分类名称">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">父分类</label>
                                    <select class="form-control" name="pid">
                                        <option value="0">根分类</option>
                                        @foreach($data as $type)
                                        
                                        <option value="{{ $type -> id }}" selected="selected">{{ $type -> name }}</option> 
                                        @endforeach
                                    </select>

                                </div> 

                               
                                
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                    </div><!-- /.box -->

                   
                      

                </div><!--/.col (left) -->
                <!-- right column -->
               
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection