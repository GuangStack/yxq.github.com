@extends('admin.layout')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                加盟管理
                <small>列表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">加盟商列表</h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
					@if(session('info'))
	                    <div id="showHidden" class="alert alert-success alert-dismissable">
	                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
	                    {{session('info')}}
	                  </div>
	                  @endif
	                  <script type="text/javascript">
	                  	window.onload = function(){
	                  		$('#showHidden').hide(3000);
	                  	};
	                  </script>
					<div class="row">

					</div>
                         <table id="example2" class="table">
                                <thead>
                                <tr>
                                    <th>加盟ID</th>
                                    <th>城市</th>
                                    <th>加盟商</th>
                                    <th>电话</th>
                                    <th>加盟原因</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
								@foreach($data as $join)
                                <tr>
                                    <td>{{$join ->id}}</td>
                                    <td>{{$join ->city}}
                                    </td>
                                    <td>{{$join ->name}}</td>
                                    <td>{{$join ->phone}}</td>
                                    <td>{{ $join -> reason }}</td>
                                    <td><a href="{{url('/admin/join/edit')}}/{{$join -> id}}">修改</a>  <a href="{{url('/admin/join/delete')}}/{{$join -> id}}">删除</a></td>
                                </tr>
								@endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


@endsection
