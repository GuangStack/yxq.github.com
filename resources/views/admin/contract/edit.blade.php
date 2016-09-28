@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                合同管理
                <small>編辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">合同管理</a></li>
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
                            <h3 class="box-title">编辑合同</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <form role="form" action="{{ url('/admin/contract/update') }}" method="post">
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
                                    <label>客户姓名</label>
                                    <input type="text" disabled="" value="{{ $data -> name }}" placeholder="" id="hongname" class="form-control" name="">
                                </div>
                                <div class="form-group">
                                    <label>红娘姓名</label>
                                    <input type="text" disabled="" value="{{ $data -> hongname }}" placeholder="" id="hongname" class="form-control" name="">
                                </div>
                                <div class="form-group">
                                    <label>红娘电话</label>
                                    <input type="text" disabled="" value="{{ $data -> hongphone }}" placeholder="" id="hongname" class="form-control" name="">
                                </div>
                                <div class="form-group">
                                    <label>合同创建时间</label>
                                    <input type="text" disabled="" value="{{ date('Y-m-d H:i:s',$data -> time) }}" placeholder="" id="hongname" class="form-control" name="">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">保证效率</label>
                                    <input type="text" class="form-control" value="{{ $data -> efficiency }}" name="efficiency" id="exampleInputUsername"
                                           placeholder="请输入保证效率，多久能完成客户的需求">
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