@extends('admin.layout')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                充值管理
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
                            <h3 class="box-title">充值记录</h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                    @if(session('info'))
                        <div id="showHidden" class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4>    <i class="icon fa fa-check"></i> Alert!</h4>
                        {{session('info')}}
                      </div>
                      @endif
                      <script type="text/javascript">
                        window.onload = function(){
                            $('#showHidden').hide(3000);
                        };
                      </script>

                         <table style="text-align: center;" id="example2" class="table">
                                <thead>
                                <tr style="text-align: center;border:1px solid red;">
                                    <th style="text-align: center;border: 1px solid red;">ID</th>
                                    <th style="text-align: center;border: 1px solid red;">用户编号</th>
                                    <th style="text-align: center;border: 1px solid red;">充值金额</th>
                                    <th style="text-align: center;border: 1px solid red;">购买心值</th>
                                    <th style="text-align: center;border: 1px solid red;">充值时间</th>
                                    <th style="text-align: center;border: 1px solid red;">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $recharge)
                                <tr style="height: 60px;">
                                    <td style="display:table-cell; vertical-align:middle">{{$recharge ->id}}</td>
                                    <td style="display:table-cell; vertical-align:middle" name="name">{{$recharge ->user_id}}
                                    </td>
                                    <td style="display:table-cell; vertical-align:middle">{{$recharge ->money}}</td>
                                    
                                    <td style="display:table-cell; vertical-align:middle" class="lang">{{ $recharge -> love }}</td>
                                    <td style="display:table-cell; vertical-align:middle" class="lang">{{ date('Y-m-d H:i:s', $recharge -> time) }}</td>
                                   <td style="display:table-cell; vertical-align:middle"><a href="{{url('/admin/recharge/edit')}}/{{$recharge -> id}}"><img width="40px" src="{{ url('/uploads/edit.png')}}"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{url('/admin/recharge/delete')}}/{{$recharge -> id}}"><img width="40px" src="{{ url('/uploads/delete.png')}}"></a></td>
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
