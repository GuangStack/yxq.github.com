@extends('admin.layout')
@section('content')
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               活动管理
                <small>列表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台</a></li>
                <li><a href="#">活动管理</a></li>
                <li class="active">列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">活动基本信息表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        @if(session('info'))
                        <div id ='showhidden' class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>    <i class="icon fa fa-check"></i> 提示!</h4>
                            {{session('info')}}

                           @endif
                         </div>
                         <script type="text/javascript">
                            
                            window.onload = function(){

                                $('#showhidden').hide(2000);
                            }
                
                         </script>
                           
                             <div class = "row">
                               <form action ="{{url('admin/activity/index')}}" method="get">
                         

                                    <div class = 'col-md-4'>
                                        
                                        <select  name ="num" class="form-control">
                                            <option value="10"
                                                @if(!empty($request['num']) && $request['num'] == 10)
                                                    selected ='selectd'

                                                @endif >
                                                10

                                            </option>
                                            <option value="20"
                                                    @if(!empty($request['num']) &&
                                                    $request['num'] == 20)
                                                    selected ='selectd'

                                                @endif >

                                            20</option>
                                            <option value="50"
                                                @if(!empty($request['num']) && $request['num']==50)
                                                    selected = 'selected'
                                                @endif

                                            >50</option>
                                            <option value="100"

                                            @if(!empty($request['num']) && $request['num']==100)
                                                    selected = 'selected'
                                                @endif


                                            >100</option>
                                        </select>



                                    </div>




                                    <div class = 'col-md-6 col-md-offset-2'>
                                        
                                        <div class="input-group input-group">
                                            <input class="form-control" name="keyword" type="text">
                                            <span class="input-group-btn">
                                              <button class="btn btn-info btn-flat">搜索</button>
                                            </span>
                                         </div>

                                   </div>
                              </form>



                           </div>
                          
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>活动名称</th>
                                    <th>活动地点</th>
                                    <th>报名电话</th>
                                    <th>操　作</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $active )
                                <tr>
                                    <td class = 'ids'>{{$active -> id }}</td>
                                    <td name = 'title'>{{$active -> title}} </td>

                                    <td>{{$active -> place}}</td>
                                    <td>{{$active -> connect}}</td>
                                    
                
                                    <td>
                                    <a href="{{url('/admin/activity/edit')}}/{{$active->id}}">编辑</a>|
                                        
                                     <a href="{{url('/admin/activity/delete')}}/{{$active->id}}">删除</a>|

                                     <a href ="{{url('/admin/activity/details')}}/{{$active ->id}}">活动详情</a>|
                                    
                                     <a href ="{{url('/admin/activity/loveactivity')}}/{{$active ->id}}">报名情况</a>
                                     <a href ="{{url('/admin/activity/loveresult')}}/{{$active ->id}}">相亲结果表</a>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                               
                            </table>    
                        
                         {!! $data->render() !!}
    
        
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->



@endsection
