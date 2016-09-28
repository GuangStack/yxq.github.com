@extends('admin.layout')
@section('content')
            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                万人相亲大会
                <small>编辑</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">万人相亲大会管理</a></li>
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
                            <h3 class="box-title">快速修改活动</h3>
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



                        <form role="form" action ="{{url('/admin/blind/update')}}" method='post' enctype ="multipart/form-data">
                           {{csrf_field()}} 
                           <input type = 'hidden' name = 'id' value = '{{$data -> id}}'>

                            
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">活动名称</label>
                                    <input type="text" name="name" value="{{$data -> name}}" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入活动名称">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">主办方</label>
                                    <input type="text" name="sponsor" value="{{$data->sponsor}}" class="form-control" id="exampleInputPassword1"
                                           placeholder="活动主办方">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">赞助方</label>
                                    <input type="text" name="supple"  value="{{$data->supple}}"class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入活动赞助方">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">活动开始时间</label>
                                    <input type="text" name="starttime" value="{{$data->starttime}}" class="form-control   
                                    </div></div>" id="exampleInputPassword1"
                                           placeholder="请输入活动开始时间">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">活动结束时间</label>
                                    <input type="text" name='endtime'   value="{{$data->endtime}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="活动开始时间">
                                </div>
                               
                               <div class="form-group">
                                    <label for="exampleInputPassword1">活动地点</label>
                                    <input type="text"  name="address"  value="{{$data->address}}" class="form-control"  id="exampleInputPassword1"
                                            placeholder="请输入活动地点">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">活动备注</label>
                                    <input type="text" name="remark" value="{{$data->remark}}" class="form-control" id="exampleInputPassword1"
                                           placeholder="活动备注">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">人数上限</label>
                                    <input type="text" name="max"  value="{{$data->max}}" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入邀请的最多人数">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">联系方式</label>
                                    <input type="text" name="connect"   value="{{$data->connect}}" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入联系方式">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">报名开始时间</label>
                                    <input type="text" name="startenterend" value="{{$data->startenterend}}" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入报名费用">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">报名截止时间</label>
                                    <input type="text" name="endenter" value="{{$data->endenter}}" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入报名截止时间">
                                </div>
                                

                               <div class="form-group">
                                    <label for="exampleInputPassword1">活动状态</label>
                                    <select name= 'status'>
                                        <option value = '0'>活动未开始</option>
                                        <option value = '1'>活动报名中</option>
                                        <option value = '2'>活动进行中</option>
                                        <option value = '3'>活动结束</option>

                                    </select>

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
