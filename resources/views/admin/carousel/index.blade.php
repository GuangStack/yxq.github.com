@extends('admin.layout')
@section('content')
   <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                轮播图片管理
                <small>列表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">轮播图片管理</a></li>
                <li class="active">列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">快速查看轮播图片</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                           
                                @if(session('info'))
                                <div  id="showHidden"class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4>    <i class="icon fa fa-check"></i> 提示!</h4>
                                    {{ session('info') }}
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
                                 
                                    <th>图片展示</th>
                                    <th>操作</th>
                                 
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($data as $carousel)
                                <tr>
                                    <td id='id'>{{ $carousel -> id}}</td>
                                    <td id="image1"><img width="200" height="50" src="{{ $carousel -> image1 }} "></td>
                                    <td name="update">更换图片</td>
                                    <!-- <td><a>更换图片</a></td> -->
                                        
                                       
                                    
                                </tr>

                                <tr>
                                    <td id='id' >{{ $carousel -> id}}</td>
                                    <td id="image2"><img width="200" height="50" src="{{ $carousel -> image2 }}"></td>
                                    <td name="update">更换图片</td>
                                    
                                       
                                    
                                </tr>
                                <tr>
                                    <td  id='id'>{{ $carousel -> id}}</td>
                                    <td id="image3"><img width="200" height="50" src="{{ $carousel -> image3 }}"></td>
                                   <td name="update">更换图片</td>
                                    
                                       
                                </tr>
                                <tr>
                                    <td  id='id'>{{ $carousel -> id}}</td>
                                    <td id="image4"><img width="200" height="50" src="{{ $carousel -> image4 }}"></td>
                                    <td name="update">更换图片</td>
                                    
                                        
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
    <script type="text/javascript">
       
        window.onload = function()
        {
            
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            //双击修改用户名
            $('td[name=update]').dblclick(db);
        
            function db()
            {
                var td = $(this);
               
                //获取原来的id
              //  var id = $('#id').html();
               var id=td.prev().prev().html();
               var img = td.prev().attr('id');
               
               // alert(img);
                //获取当前里面的值
                //var name = td.html();

               var inp = $('<form role="form" action="{{ url("/admin/carousel/ajaxUpdate") }}" method="post"  enctype="multipart/form-data">{{ csrf_field() }}<div class="form-group"><input type="hidden" name="id" value='+id+'><input type="hidden" name="img" value='+img+'><label for="exampleInputFile">上传图片</label><input type="file" name='+img+' id="exampleInputFile" ><p class="help-block">一定要选择一张好看的哦！！!</p></div><button id="button">提交<button></form>');
               //inp.val(update);

                //将表单放到td内
                
             

                td.html(inp);
                //光标自动对焦
                // inp.select();
                var newname = inp.html();
              //  alert(newname);
                $("#button").on(click,function(){
                    //alert (1111);
                    var image = $("#exampleInputFile").val();
                    // alert(image);
                });


                //失去焦点事件
                
            
            }
        }
    </script>
@endsection
