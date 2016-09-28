@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                好友关系管理
                <small>編辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">好友关系管理</a></li>
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
                            <h3 kclass="box-title">编辑好友关系</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <form role="form" action="{{ url('/admin/friend/update') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$user_id}}">
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
                                    <input type="text" class="form-control" value="{{$user_id}}" name="user_id" id="exampleInputUsername"
                                           placeholder="用户编号">
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <input type="text" disabled="" 
                                       value ="{{$placeholder}}"
                                     class="form-control">
                                </div>
                                <input type="hidden" value="{{$placeholder}}" name="place">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ta 的编号--多个编号之间用逗号(,)分隔</label>
                                    <input type="text" class="form-control" value="{{ $fstr }}" name="friendid" id="exampleInputUsername"
                                           placeholder="ta 的编号">
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