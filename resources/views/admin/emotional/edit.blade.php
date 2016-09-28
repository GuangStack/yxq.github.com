@extends('admin.layout')
@section('content')


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               情感故事编辑
                <small>编辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">情感故事编辑</a></li>
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
                            <h3 class="box-title">快速编辑情感故事</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                         
                        <form role="form" action="{{ url('/admin/emotional/update') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $data -> id }}">
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
                                    <label for="exampleInputPassword1">标题</label>
                                    <input type="text" name="title" value="{{ $data -> title }}"class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入标题">
                                </div>
                               
                                
                                
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">类型</label>
                                    <select class="form-control" name="type">
                                        <option value="0"  
                                                @if(  $data -> type == 0)
                                                    selected="selected" 
                                                @endif
                                                >我的情感</option> 
                                        <option value="1"
                                                @if(  $data -> type == 1)
                                                    selected="selected" 
                                                @endif
                                                >求倾诉</option>
                                        <option value="2"
                                                @if( $data -> type == 2)
                                                    selected="selected" 
                                                @endif
                                                 >爱情训练营</option> 
                                        <option value="3"
                                                @if( $data -> type == 3)
                                                    selected="selected" 
                                                @endif >微话题</option>  
                                    </select>

                                </div>

                                
                                <div class="form-group">
                                    <label for="exampleInputFile">情感内容</label>
                                    <!-- 加载编辑器的容器 -->
                                    <script style="width:100%;height:200px;" id="container" name="content" type="text/plain">{{ $data -> content}}</script>
                                    <!-- 配置文件 -->
                                    <script type="text/javascript" src="{{ url('/ue/ueditor.config.js') }}"></script>
                                    <!-- 编辑器源码文件 -->
                                    <script type="text/javascript" src="{{ url('/ue/ueditor.all.js') }}"></script>
                                    <!-- 实例化编辑器 -->
                                    <script type="text/javascript">
                                        var ue = UE.getEditor('container');
                                    </script>
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