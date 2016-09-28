@extends('admin.layout')
@section('content')
   <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                情感故事管理
                <small>列表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">情感故事管理</a></li>
                <li class="active">列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">快速查看情感故事</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <form action="{{ url('admin/success/index')}}" method="get">
                                <div class="col-md-4">
                                    <div class="form-group">
                                          
                                                <select class="form-control" name="num">
                                                    <option value="5"
                                                        @if(!empty($request['num']) && $request['num'] == 5)
                                                            selected="selected" 
                                                        @endif
                                                    >5</option>
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
                                                    <option value="30"
                                                        @if(!empty($request['num']) && $request['num'] == 30)
                                                            selected="selected" 
                                                        @endif
                                                    >30</option>
                                                   
                                                </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-2">
                                    <div class="input-group input-group">
                                        <input class="form-control" type="text" value="{{ $request['keyword'] or '' }}"  name="keyword">
                                        <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" >搜索</button>
                                        </span>
                                    </div>
                                </div>
                                </form>
                            </div>
                                @if(session('info'))
                                <div  id="showHidden"class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4>    <i class="icon fa fa-check"></i> 提示!</h4>
                                   添加成功
                                </div>
                                @endif
                                <script type="text/javascript">

                                <script type="text/javascript">
                                window.onload = function()
                                {
                                    $("#showHidden").hide(3000);
                                }
                                </script>    
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>标题</th>
                                    
                                    <th>类型</th>
                                    <th>添加时间</th>
                                   
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div style="display:none">{{$i=1}}<div>
                                @foreach($data as $emotional)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $emotional -> username }}</td>
                                    
                                    <td>{{ $emotional -> title }}</td>
                                    @if( $emotional -> type  == 0 ) 
                                    <td>我的情感</td>
                                    @elseif( $emotional -> type == 1 )
                                    <td>求倾诉</td>
                                    @elseif( $emotional -> type  == 2 )
                                    <td>爱情训练营</td>
                                    @elseif( $emotional -> type  == 3 )
                                    <td>微话题</td>
                                    @endif
                                    <td>{{ date('Y-m-d',$emotional -> time)}}</td>
                                   

                                    
                                    <td>
                                    
                                        <a href="{{ url('/admin/emotional/edit') }}/{{ $emotional -> id }}">编辑</a>|
                                        <a href="{{ url('/admin/emotional/delete') }}/{{ $emotional -> id }}">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

<!-- page script -->
    
@endsection
