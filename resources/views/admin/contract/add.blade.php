@extends('admin.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                合同管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"管理</a></li>
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
                            <h3 class="box-title">添加合同</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <form role="form" action="{{ url('/admin/contract/insert') }}" method="get">
                        	{{csrf_field()}}
                            <div class="box-body">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissable">
			                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			                    <h4>警告！</h4>
			                    	<ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							 
								
			                  </div>
							@endif
			                 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">客户编号</label>
                                    <input type="text" class="form-control getajax" value="{{old('user_id')}}" name="user_id" id="exampleInputUsername"
                                           placeholder="请输入客户编号">
                                </div>
                                <div class="form-group">
                                    <label>客户姓名</label>
                                    <input type="text" disabled="" value="" placeholder="" class="form-control" name='name' id="customer">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">红娘编号</label>
                                    <input type="text" class="form-control gethong" value="{{old('hongname')}}" name="hong_id" id="exampleInputUsername"
                                           placeholder="请输入红娘编号">
                                </div>
                                <div class="form-group">
                                    <label>红娘姓名</label>
                                    <input type="text" disabled="" value="" placeholder="" id="hongname" class="form-control" name="">
                                </div>
                                <div class="form-group">
                                    <label>红娘手机</label>
                                    <input type="text" disabled="" value="" placeholder="" id="hongphone" class="form-control" name="hongphone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">保证效率</label>
                                    <input type="text" class="form-control" value="{{old('phone')}}" name="efficiency" id="exampleInputUsername"
                                           placeholder="请输入保证效率，多久能完成客户的需求">
                                </div>  
                               
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
                            </div>
                        </form>
                    </div><!-- /.box -->



                </div><!--/.col (left) -->

            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <script type="text/javascript">
        window.onload = function(){
            // alert($);
            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
            $('.getajax').on('blur',function(){
                    var id = $(this).val();
                    $.post('/admin/contract/ajaxUpdate',{id:id},function(data){
                                if(data == '0')
                                {
                                    alert('用户不存在');
                                    $('#customer').val('');  
                                }
                               
                                else
                                {
                                    $('#customer').val(data);   
                                }
                                                                                  
                    },'json');
                });

            $('.gethong').on('blur',function(){
                var id = $(this).val();
                $.post('/admin/contract/ajaxselectHong',{id:id},function(data){
                    // $('#hongname').val();
                    // $('hongphone').val();
                    // alert(data);
                    if(data == '0')
                    {
                        alert('红娘信息不存在');
                        $('#hongname').val('');
                        $('#hongphone').val('');
                    }
                   
                    else
                    {
                        $('#hongname').val(data['name']);
                        $('#hongphone').val(data['phone']);
                    }
                });
            });
        }
    </script>
    
@endsection('content')