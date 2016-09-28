@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                任务管理
                <small>編辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">任务管理</a></li>
                <li class="active">編辑</li>
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
                            <h3 class="box-title">编辑任务</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <form role="form" action="{{ url('/admin/task/update') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$data -> id}}">
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
                                    <label for="exampleInputEmail1">任务标题</label>
                                    <input type="text" class="form-control" value="{{$data -> title}}" name="title" id="exampleInputUsername"
                                           placeholder="请输入任务名">
                                </div>
                              
                               <div class="form-group">
                                    <label for="exampleInputEmail1">任务内容</label>
                                    <input type="text" class="form-control" value="{{ $data -> content }}" name="content" id="exampleInputUsername"
                                           placeholder="任务内容">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">完成任务获得心值数</label>
                                    <input type="text" class="form-control" value="{{ $data -> getlove }}" name="getlove" id="exampleInputUsername"
                                           placeholder="完成任务获得心值数">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputFile">原始图片</label>
                                    <img width="200px" src="{{$data -> image}}">
                                    <p class="help-block">原来的图片</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片</label>
                                    <input type="file" id="exampleInputFile" name="image">
                                    <p class="help-block">选择图片作为任务显示的图片</p>
                                </div>

                                
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">更新</button>
                                <button type="reset" class="btn btn-default">重置</button>
                            </div>
                        </form>
                    </div><!-- /.box -->



                </div><!--/.col (left) -->

            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    
@endsection('content')