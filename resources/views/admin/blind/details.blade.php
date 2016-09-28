@extends('admin.layout')
@section('content')


     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               万人相亲大会
                <small>详情</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台</a></li>
                <li><a href="#">万人相亲大会</a></li>
                <li class="active">详情</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">万人相亲大会</h3>
                        </div><!-- /.box-header -->
                            <table class = 'table'>
                                <thead>
                                <tr>
                                    <th>万人相亲大会<th>

                                </tr>
                                </thead>
                                <tbody>
                               
                                <tr>
                                   <td>活动名称</td>
                                    <td class = 'title'>{{$data -> name}}</td>
                                    <td>活动人数</td>
                                    <td name = 'time'>{{$data -> max}}</td>
                                </tr>


                                <tr>
                                    <td>举办方</td>
                                    <td>一线牵媒人会所</td>
                                    <td>赞助方</td>
                                    <td>段氏集团</td>
                                </tr>


                                <tr>
                                   <td>地点</td>
                                    <td >{{$data -> address}}</td>
                                </tr>
                                <tr>
                                    <td>活动状态</td>
                                    <td>

                                    @if($data -> status =='0')
                                    活动未开始
                                    @endif

                                    @if($data -> status =='1')
                                    活动报名中
                                    @endif
            
                                    @if($data -> status =='2')
                                    活动进行中
                                    @endif

                                    @if($data -> status =='3')
                                    活动结束
                                    @endif

                                    <td>

                                </tr>
                                <tr>
                                    <td>活动开始时间</td>
                                    <td>{{$data -> starttime}}</td>
                                    <td>活动截止时间</td>
                                    <td>{{$data -> endtime}}</td>
                                </tr>
                                <tr>
                                    <td>活动图片</td> 
                                    <td>
                                    <img width ="80px" src = "{{$data -> img}}"

                                   </td>
                                     <td>活动备注</td>
                                    <td>{{$data -> remark}}</td>

                                    

                                </tr>
                                <tr>
                                   <td>报名电话</td>
                                    <td>{{$data -> connect}}</td>
                                </tr>
                                </tbody>   
                               
                            </table>    
                       <a href="{{url('/admin/blind/edit')}}/{{$data->id}}">编辑</a>|
    
    
        
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


@endsection
