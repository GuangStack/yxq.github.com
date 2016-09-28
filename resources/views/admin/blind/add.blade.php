@extends('admin.layout')
@section('content')
		    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                活动管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">活动管理</a></li>
                <li class="active">添加</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">快速添加活动</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
						<!-- @if(session('name'))
						<div class="alert alert-danger alert-	dismissable">
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



                        <form role="form" action ="{{url('/admin/blind/insert')}}" method='post' enctype ="multipart/form-data">
                   		   {{csrf_field()}} 

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">活动名称</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入活动名称">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">主办方</label>
                                    <input type="text" name="sponsor" class="form-control" id="exampleInputPassword1"
                                           placeholder="活动主办方">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">赞助方</label>
                                    <input type="text" name="supple" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入活动赞助方">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputFile">上传图片</label>
                                    <input id="exampleInputFile" type="file" name = 'img'>
                                    <p class="help-block">请选择活动图片</p>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">活动开始时间</label>
                                    <input type="text" name="starttime" class="form-control   
                                    </div></div>" id="exampleInputPassword1"
                                           placeholder="请输入活动开始时间">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">活动结束时间</label>
                                    <input type="text" name='endtime'  value="{{old('starttime')}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="活动开始时间">
                                </div>
                               
                               <div class="form-group">
                                    <label for="exampleInputPassword1">活动地点</label>
                                    <input type="text"  name="address"  class="form-control"  id="exampleInputPassword1"
                                            placeholder="请输入活动地点">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">活动备注</label>
                                    <input type="text" name="remark" class="form-control" id="exampleInputPassword1"
                                           placeholder="活动备注">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">人数上限</label>
                                    <input type="text" name="max" class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入邀请的最多人数">
                                </div>

                                

                                <div class="form-group">
                                    <label for="exampleInputPassword1">联系方式</label>
                                    <input type="text" name="connect"  value="{{old('connect')}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入联系方式">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">报名开始时间</label>
                                    <input type="text" name="startenterend"  value="{{old('money')}}"  class="form-control" id="exampleInputPassword1"
                                           placeholder="请输入报名费用">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">报名截止时间</label>
                                    <input type="text" name="endenter"  value="{{old('endenter')}}"  class="form-control" id="exampleInputPassword1"
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


                                           
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
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
