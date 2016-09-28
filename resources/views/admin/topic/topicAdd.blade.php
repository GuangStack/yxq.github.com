
@extends('admin.layout')
@section('content')


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               话题管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">话题管理</a></li>
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
                            <h3 class="box-title">快速添加话题</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                         
                        <form role="form" action=" {{ url('/admin/topic/insert') }}" method="post">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">

                        	{{ csrf_field() }}
                        	<!-- @if(count($errors) > 0)
                        	<div class="alert alert-danger">
                    			<ul>
                    				@foreach($errors -> all() as $error)
                    				<li>{{ $error }}</li>
                    				@endforeach
                    			</ul>
                 			</div>
                 			@endif -->
                 			
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">标题</label>
                                    <input type="text" name="title"  class="form-control" id="exampleInputEmail1"
                                           placeholder="请输入标题">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">内容</label>
                                    <!-- 加载编辑器的容器 -->
                                    <script style="width:100%;height:200px;" id="container" name="content" type="text/plain">写出你想说的</script>
                                    <!-- 配置文件 -->
                                    <script type="text/javascript" src="{{ url('/ue/ueditor.config.js') }}"></script>
                                    <!-- 编辑器源码文件 -->
                                    <script type="text/javascript" src="{{ url('/ue/ueditor.all.js') }}"></script>
                                    <!-- 实例化编辑器 -->
                                    <script type="text/javascript">
                                        var ue = UE.getEditor('container');
                                    </script>
                                </div>
                               <div class="form-group">
                                    <label for="exampleInputPassword1">类型</label>
                                    <select class="form-control" name="type">
                                        @foreach($data as $topic)
                                        <option value="{{ $topic -> id }}" selected="selected">{{ $topic -> name }}</option>   
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