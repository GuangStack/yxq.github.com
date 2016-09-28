@extends('admin.layout')
@section('content')


     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               活动详情表
                <small>详情</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台</a></li>
                <li><a href="#">活动管理</a></li>
                <li class="active">详情</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">活动详情表</h3>
                        </div><!-- /.box-header -->
                            <table class = 'table' id = 'example2' border ='1px'>
                                <thead>
                                <tr>
                                    <th>活动详情<th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                   <td>活动主题</td>
                                    <td class = 'title'>{{$data -> title}}</td>
                                    <td>活动时间</td>
                                    <td name = 'time'>{{$data ->starttime}}--{{$data -> endtime}}</td>
                                </tr>
                                
                                <tr>
                                   <td>地点</td>
                                    <td >{{$data -> place}}</td>
                                </tr>
                                <tr>
                                    <td>活动类型</td>
                                    <td>

                                    @if($data ->style =='0')
                                    线上活动
                                    @endif

                                    @if($data -> style =='1')
                                    线下活动
                                    @endif

                                    @if($data -> style =='2')
                                    商务合作'
                                    @endif

                                    <td>

                                </tr>
                                <tr>
                                    <td>报名开始时间</td>
                                    <td>{{$data -> starttime}}</td>
                                    <td>报名截止时间</td>
                                    <td>{{$data -> endenter}}</td>
                                </tr>
                                <tr>
                                    <td>男生人数</td> 
                                    <td>{{$data -> man}}</td>
                                    <td>女生人数</td>
                                    <td>{{$data -> woman}}</td>
                                </tr>
                                <tr>
                                    <td>活动费用</td>
                                    <td>{{$data -> money}}</td>>

                                </tr>
                                <tr>
                                    <td>活动内容</td>
                                    <td>{{$data -> content}}</td>

                                </tr>
                                </tbody>
                               
                            </table>    
                        

    
        
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


@endsection
