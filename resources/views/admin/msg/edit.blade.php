@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                站内信管理
                <small>編辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">站内信管理</a></li>
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
                            <h3 class="box-title">编辑站内信</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <form role="form" action="{{ url('/admin/msg/update') }}" method="post">
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
                                    <label>消息编号</label>
                                    <input type="text" disabled="" value="{{ $data -> id }}" placeholder="" class="form-control" name="id">
                                </div>
                                <div class="form-group">
                                    <label>用户编号</label>
                                    <input type="text" disabled="" value="{{ $data -> user_id }}" placeholder="" class="form-control" name="user_id">
                                </div>
                                
                               <div class="form-group">
                                    <label for="exampleInputEmail1">发送内容</label>
                                    <input type="text" class="form-control" value="{{ $data -> content }}" name="content" id="exampleInputUsername"
                                           placeholder="站内信内容">
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