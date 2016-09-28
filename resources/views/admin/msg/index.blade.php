@extends('admin.layout')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                站内信管理
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
                            <h3 class="box-title">站内信列表</h3>
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
                    <div class="row">

                    <form action="{{ url('admin/msg/index') }}" method="get">
                    
                    <div class="col-md-4">
                        <div class="form-group">                                  
                                    <select name="num" class="form-control">
                                        <option value="10"
                                        @if(!empty($request['num']) && $request['num'] == 10)
                                            selected="selected" 
                                        @endif

                                        >10</option>
                                        <option value="20"
                                        @if(!empty($request['num']) && $request['num'] == 20)
                                            selected="selected" 
                                        @endif

                                        >20</option>
                                        <option value="50"
                                        @if(!empty($request['num']) && $request['num'] == 50)
                                            selected="selected" 
                                        @endif

                                        >50</option>
                                        <option value="100"
                                        @if(!empty($request['num']) && $request['num'] == 100)
                                            selected="selected" 
                                        @endif

                                        >100</option>
                                     
                                    </select>
                                </div>
                    </div>
                        <div class="col-md-6 col-md-offset-2">
                        <div class="input-group input-group">
                            <input type="text" value="{{ $request['keyword'] or '' }}" name="keyword" class="form-control" placeholder="请输入用户编号">
                        <span class="input-group-btn">
                          <button class="btn btn-info btn-flat">搜索</button>
                        </span>
                       </div>
                        </div>

                    </form>
                    </div>
                         <table style="text-align: center;" id="example2" class="table">
                                <thead>
                                <tr style="text-align: center;border:1px solid red;">
                                    <th style="text-align: center;border: 1px solid red;">消息编号</th>
                                    <th style="text-align: center;border: 1px solid red;">发送时间</th>
                                    <th style="text-align: center;border: 1px solid red;">发送的管理员编号</th>
                                    <th style="text-align: center;border: 1px solid red;">接收用户编号</th>
                                    <th style="text-align: center;border: 1px solid red;">发送内容</th>
                                    <th style="text-align: center;border: 1px solid red;">是否已读</th>
                                    <th style="text-align: center;border: 1px solid red;">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $msg)
                                <tr style="height: 60px;">
                                    <td style="display:table-cell; vertical-align:middle;">{{$msg ->id}}</td>
                                    <td style="display:table-cell; vertical-align:middle">{{ date('Y-m-d H:i:s', $msg -> time) }}
                                    </td>
                                    <td style="display:table-cell; vertical-align:middle">{{$msg ->send_id}}</td>
                                    
                                    <td style="display:table-cell; vertical-align:middle" class="lang">{{ $msg -> user_id }}</td>
                                    <td style="display:table-cell; vertical-align:middle" class="lang">{{ $msg -> content }}</td>
                                    <td style="display:table-cell; vertical-align:middle" class="lang">
                                        @if( $msg -> read  == '0')
                                            未读
                                        @else
                                            已读
                                        @endif
                                    </td>
                                   <td style="display:table-cell; vertical-align:middle"><a href="{{url('/admin/msg/edit')}}/{{$msg -> id}}"><img width="30px" src="{{ url('/uploads/edit.png')}}"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{url('/admin/msg/delete')}}/{{$msg -> id}}"><img width="30px" src="{{ url('/uploads/delete.png')}}"></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>

                            {!! $data -> appends($request) ->render() !!}
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    

@endsection
