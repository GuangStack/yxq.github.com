@extends('admin.layout')
@section('content')
            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                活动管理
                <small>编辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">活动管理</a></li>
                <li class="active">编辑</li>
            </ol>
        </section>j

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">快速编辑活动</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <!-- @if(session('name'))
                        <div class="alert alert-danger alert-   dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i>  
                            警告
                            </h4>
                            {{session('name')}}
                         </div>
                        @endif -->
                        
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        @endif



                        <form role="form" action ="{{url('/admin/activity/update')}}" method='post' enctype ="multipart/form-data">

                           {{csrf_field()}} 
                           <input type = 'hidden' name = 'id' value = '{{$data -> id}}'>

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">活动名称</label>
                                    <input type="text" name="title" value="{{$data->title}}" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入活动名称">
                                </div>
                                

                                <div class="form-group">
                                    <label for="exampleInputFile">原活动图片</label>
                                    <img type = 'file' name = 'oldImg' src="{{ $data -> img }}" width = '200px'>
                                    <p class="help-block">原活动图片</p>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片</label>
                                    <input id="exampleInputFile" type="file" name = 'img'>
                                    <p class="help-block">请选择新图片作为活动图片</p>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">活动开始时间</label>
                                    <input type="text" name="starttime" value="{{$data->starttime}}"class="form-control   
                                    </div></div>" id="exampleInputPassword1"
                                           placeholder="请输入活动开始时间">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">活动结束时间</label>
                                    <input type="text" name='endtime'  value="{{$data->endtime}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="活动开始时间">
                                </div>
                               
                               <div class="form-group">
                                    <label for="exampleInputPassword1">地点</label>
                                    <input type="text"  name="place" value="{{$data->place}}" class="form-control"  id="exampleInputPassword1"
                                            placeholder="请输入活动地点">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">活动类型</label>
                                    <select name= 'style'>
                                        <option value = '0'>0</option>
                                        <option value = '1'>1</option>
                                        <option value = '2'>2</option>

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">特殊要求</label>
                                    <input type="text" name="ps" value="{{$data->ps}}"class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入活动特殊要求">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">男</label>
                                    <input type="text" name="man" value="{{$data->man}}"class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入邀请男生人数">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">女</label>
                                    <input type="text" name="woman"  value="{{$data->woman}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入邀请女生人数">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">联系方式</label>
                                    <input type="text" name="connect"  value="{{$data->connect}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入联系方式">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">活动费用</label>
                                    <input type="text" name="money"  value="{{$data->money}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入报名费用">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">报名截止时间</label>
                                    <input type="text" name="endenter"  value="{{$data->endenter}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入报名截止时间">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="exampleInputFile">活动详情</label>
                                     <!-- 加载编辑器的容器 -->
                                    <script id="container" name="content" value="{{$data->connect}}" type="text/plain">
                                  
                                   <div>
                                   </div>
                                    </script>
                                    <!-- 配置文件 -->
                                    <script type="text/javascript" src="{{url('/ue/ueditor.config.js')}}"></script>
                                    <!-- 编辑器源码文件 -->
                                    <script type="text/javascript" src="{{url('/ue/ueditor.all.js')}}"></script>
                                    <!-- 实例化编辑器 -->
                                    <script type="text/javascript">
                                        var ue = UE.getEditor('container');
                                    </script>

                                   
                                </div>
                                           
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                        </form>
                    </div><!-- /.box -->

                    

                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
            

@endsection
