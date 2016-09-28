@extends('admin.layout')
@section('content')


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               成功故事编辑
                <small>编辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">成功故事编辑</a></li>
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
                            <h3 class="box-title">快速编辑成功故事</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                         
                        <form role="form" action="{{ url('/admin/success/update') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1">女方姓名</label>
                                    <input type="text" name="manname"  class="form-control" id="exampleInputEmail1" value="{{ $data -> manname }}"
                                           placeholder="请输入女方姓名">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">男方姓名</label>
                                    <input type="text" name="womanname" value="{{ $data -> womanname }}"class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入男方姓名">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">标题</label>
                                    <input type="text" name="title" value="{{ $data -> title }}"class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入标题">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">简介</label>
                                    <input type="text" name="introduce" value="{{ $data -> introduce }}"class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入简介">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">结婚时间</label>
                                    <input type="text" name="time" value="{{ date('Y-m-d',$data -> time) }}" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入结婚时间,按照：1991-01-01这种格式填写">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">类型</label>
                                    <select class="form-control" name="type">
                                        <option value="0"  
                                                @if(  $type == 0)
                                                    selected="selected" 
                                                @endif
                                                >一波三折</option> 
                                        <option value="1"
                                                @if(  $type == 1)
                                                    selected="selected" 
                                                @endif
                                                >郎才女貌</option>
                                        <option value="2"
                                                @if(  $type == 2)
                                                    selected="selected" 
                                                @endif
                                                 >一见钟情</option> 
                                        <option value="3"
                                                @if(  $type == 3)
                                                    selected="selected" 
                                                @endif >90后</option>  
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片</label>
                                    <input type="file" name="image" id="exampleInputFile">
                                    <p class="help-block">一定要选择一张好看的哦！！！</p>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">写一下你们的浪漫故事</label>
                                    <!-- 加载编辑器的容器 -->
                                    <script style="width:100%;height:200px;" id="container" name="detail" type="text/plain">
                                        请在这里写一下你们的浪漫故事
                                    </script>
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