@extends('admin.layout')
@section('content')


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               轮播图片管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">轮播图管理</a></li>
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
                            <h3 class="box-title">快速添加轮播图</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                         
                        <form role="form" action="{{ url('/admin/carousel/insert') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="exampleInputPassword1">ID</label>
                                    <select class="form-control" name="id">
                                        <option value="1" selected="selected">1</option> 
                                        <option value="2" >2</option>
                                        <option value="3" >3</option> 
                                        <option value="4" >4</option>  
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片</label>
                                    <input type="file" name="image1" id="exampleInputFile">
                                    <p class="help-block">一定要选择一张好看的哦！！!</p>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片</label>
                                    <input type="file" name="image2" id="exampleInputFile">
                                    <p class="help-block">一定要选择一张好看的哦！！!</p>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片</label>
                                    <input type="file" name="image3" id="exampleInputFile">
                                    <p class="help-block">一定要选择一张好看的哦！！!</p>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片</label>
                                    <input type="file" name="image4" id="exampleInputFile">
                                    <p class="help-block">一定要选择一张好看的哦！！!</p>

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