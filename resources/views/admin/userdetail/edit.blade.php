@extends('admin.layout')
@section('content')


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户详情编辑
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 后台主页</a></li>
                <li><a href="#">用户详情添加</a></li>
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
                            <h3 class="box-title">快速添成功故事</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                         
                        <form role="form" action="{{ url('/admin/userdetail/update') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $data -> id}}">
                        	{{ csrf_field() }}
                        	@if(count($errors) > 0)
                        	<div class="alert alert-danger">
                    			<ul>
                    				@foreach($errors -> all() as $error)
                    				<li>{{ $error }}</li>
                    				@endforeach
                    			</ul>
                 			</div>
                 			@endif
                 			
                            <div class="box-body">
                                <div  class="col-xs-6">
                                    <label for="exampleInputEmail1">用户名ID</label>
                                    <input type="text" name="user_id"  class="form-control" id="exampleInputEmail1"
                                           placeholder="{{ $data -> user_id }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">真实姓名</label>
                                    <input type="text" name="realname" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ $data -> realname }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">性别</label>
                                   <select class="form-control" name="sex">
                                        @if($data -> sex == 0)
                                        <option value="0" selected="selected">男</option> 
                                        @else
                                        <option value="1" selected="selected">女</option>
                                        @endif
                                    </select>
                                </div>
                               
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">身高</label>
                                    <input type="text" name="height" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ $data -> height }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">电话</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ $data -> phone }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">生日</label>
                                    <input type="text" name="birthday" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ date('Y-m-d H:i:s',$data -> birthday) }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">身份证号</label>
                                    <input type="text" name="cartid" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ $data -> cartid }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">qq号</label>
                                    <input type="text" name="qq" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ $data -> qq }}">
                                </div>
                                 <div class="col-xs-6">
                                    <label for="exampleInputPassword1">通讯地址</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ $data -> address }}">
                                </div>
                                 <div class="col-xs-6">
                                    <label for="exampleInputPassword1">邮编</label>
                                    <input type="text" name="code" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ $data -> code }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">兴趣爱好</label>
                                    <input type="text" name="interest" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ $data -> interest }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">心值总和</label>
                                    <input type="text" name="loveamount" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ $data -> loveamount }}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">择哦要求</label>
                                    <input type="text" name="demand" class="form-control" id="exampleInputPassword1"
                                           placeholder="{{ $data -> demand }}">
                                </div>
                                
                                 <div class="col-xs-6">
                                    <label for="exampleInputPassword1">婚姻状况</label>
                                   <select class="form-control" name="marray">
                                        <!-- @if( $data -> marray == 0) -->
                                        <option value="0" selected="selected">未婚</option> 
                                        <!-- @elseif( $data -> marray == 1) -->
                                        <option value="1" selected="selected">已婚</option>
                                        <!-- @elseif( $data -> marray == 2 ) -->
                                        <option value="2" selected="selected">离异</option>
                                         <!-- @else( $data -> marray == 3 ) -->
                                        <option value="3" selected="selected">丧哦</option>
                                        <!-- @endif -->
                                     </select>
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">月薪</label>
                                   <select class="form-control" name="sal">
                                   

                                        <option value="0" selected="selected">0~2000</option> 
                                        <option value="1" selected="selected">2000~5000</option>
                                        <option value="2" selected="selected">5000~10000</option>
                                        <option value="3" selected="selected">10000~50000</option>
                                        <option value="3" selected="selected">50000以上</option>
                                     </select>
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">会员等级</label>
                                   <select class="form-control" name="userstar">
                                   

                                        <option value="0" selected="selected">普通用户</option> 
                                        <option value="1" selected="selected">会员用户</option>
                                        <option value="2" selected="selected">钻石会员</option>
                                        <option value="3" selected="selected">特级会员</option>
                                       
                                     </select>
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">血型</label>
                                   <select class="form-control" name="blood">
                                   

                                        <option value="0" selected="selected">A型</option> 
                                        <option value="1" selected="selected">B型</option>
                                        <option value="2" selected="selected">AB型</option>
                                        <option value="3" selected="selected">o型</option>
                                        <option value="4" selected="selected">其他</option>
                                        <option value="5" selected="selected">保密</option>
                                     </select>
                                </div>
                                 <div class="col-xs-6">
                                    <label for="exampleInputPassword1">是否有小孩</label>
                                   <select class="form-control" name="children">
                                        <option value="0" selected="selected">无</option> 
                                        <option value="1" selected="selected">有，小孩归自己</option>
                                        <option value="2" selected="selected">有，小孩归对方</option>                                        
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">是否锁定</label>
                                   <select class="form-control" name="userlock">
                                        <option value="0" selected="selected">否</option> 
                                        <option value="1" selected="selected">是</option>
                                                   
                                     </select>
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">学历</label>
                                   <select class="form-control" name="education">
                                  

                                        <option value="0" selected="selected">高中中专及以下</option> 
                                        <option value="1" selected="selected">大专</option>
                                        <option value="2" selected="selected">本科</option>
                                        <option value="3" selected="selected">双学士</option>
                                        <option value="4" selected="selected">硕士</option>
                                        <option value="5" selected="selected">博士</option>
                                        <option value="6" selected="selected">博士后</option>
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">购车情况</label>
                                   <select class="form-control" name="car">
                                  
                                        <option value="0" selected="selected">暂未购车</option> 
                                        <option value="1" selected="selected">已购车(经济型)</option>
                                        <option value="2" selected="selected">已购车(中档型)</option>
                                        <option value="3" selected="selected">已购车(豪华型)</option>
                                        
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">民族</label>
                                   <select class="form-control" name="nation">
                               


                                        <option value="0" selected="selected">汉族</option> 
                                        <option value="1" selected="selected">藏族</option>
                                        <option value="2" selected="selected">朝鲜族</option>
                                        <option value="3" selected="selected">蒙古族</option>
                                        <option value="4" selected="selected">回族</option>
                                        <option value="5" selected="selected">满族</option>
                                        <option value="6" selected="selected">维吾尔族</option>
                                        <option value="7" selected="selected">壮族</option>
                                        <option value="8" selected="selected">彝族</option>
                                        <option value="9" selected="selected">苗族</option>
                                        
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputFile">自我介绍</label>
                                    <!-- 加载编辑器的容器 -->
                                    <script style="width:100%;height:200px;" id="container" name="introduce" type="text/plain">
                                    介绍一下你自己
                                    </script>
                                    <!-- 配置文件 -->
                                    <script type="text/javascript" src="{{ url('/ue/ueditor.config.js') }}"></script>
                                    <!-- 编辑器源码文件 -->
                                    <script type="text/javascript" src="{{ url('/ue/ueditor.all.js') }}"></script>
                                    <!-- 实例化编辑器 -->
                                    <script type="text/javascript">
                                        var ue = UE.getEditor('container');
                                    </script>
                                </div>
                                <div class="col-xs-6">
                                    <label for="exampleInputPassword1">类型</label>
                                   <select class="form-control" name="type">
                                        <option value="0" selected="selected">妩媚</option> 
                                        <option value="1" selected="selected">大叔控</option>
                                        <option value="2" selected="selected">清纯</option>
                                        <option value="3" selected="selected">妖娆</option>
                                        <option value="3" selected="selected">可爱</option>
                                        <option value="3" selected="selected">白领</option>
                                        <option value="3" selected="selected">学生妹</option>
                                        <option value="3" selected="selected">少妇</option>
                                        <option value="3" selected="selected">空姐</option>
                                     </select>
                                </div>

                                
                                
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                    </div><!-- /.box -->

                   
                      

                </div><!--/.col (left) -->
                <!-- right column -->
               
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection