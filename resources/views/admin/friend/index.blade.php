@extends('admin.layout')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                好友关系管理
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
                            <h3 class="box-title">好友关系列表</h3>
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

                         <table style="text-align: center;" id="example2" class="table datatable">
                                <thead>
                                <tr>
                                    <th style="text-align: center;border: 1px solid red;">用户编号</th>
                                    <th style="text-align: center;border: 1px solid red;">好友关系</th>
                                    <th style="text-align: center;border: 1px solid red;">好友编号</th>
                                    <th style="text-align: center;border: 1px solid red;">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($farr as $uid => $friend)
                                <tr>
                                    <td style="display:table-cell; vertical-align:middle;" rowspan="3">{{$uid}}</td>
                                    <td style="display:table-cell; vertical-align:middle;color: red;">你的好友</td>
                                    <td style="display:table-cell; vertical-align:middle" class="lang">{{ $friend }}</td>

                                    <td><a href="{{url('/admin/friend/edit')}}/{{$uid}}/1"><img width="40px" src="{{ url('/uploads/edit.png')}}"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{url('/admin/friend/delete')}}/{{$uid}}/1"><img width="40px" src="{{ url('/uploads/delete.png')}}"></a>
                                    </td>

                                <tr>
                                        <td style="display:table-cell; vertical-align:middle;color: blue;" >你的关注</td>

                                        <td style="display:table-cell; vertical-align:middle" >{{ $carr[$uid] }}</td>

                                         <td><a href="{{url('/admin/friend/edit')}}/{{$uid}}/2"><img width="40px" src="{{ url('/uploads/edit.png')}}"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{url('/admin/friend/delete')}}/{{$uid}}/2"><img width="40px" src="{{ url('/uploads/delete.png')}}"></a>
                                    </td> 
                                    </tr>
                                    <tr>
                                        <td style="display:table-cell; vertical-align:middle; color: green;" >关注你的</td>

                                        <td>{{ $carred[$uid] }}</td>

                                         <td style="display:table-cell; vertical-align:middle" ><a href="{{url('/admin/friend/edit')}}/{{$uid}}/3"><img width="40px" src="{{ url('/uploads/edit.png')}}"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{url('/admin/friend/delete')}}/{{$uid}}/3"><img width="40px" src="{{ url('/uploads/delete.png')}}"></a>
                                    </td>

                                    </tr>
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
