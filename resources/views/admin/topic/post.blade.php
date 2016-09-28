@extends('admin.layout')
@section('content')
<div class="content-wrapper">
	<div class="row">
		<div class="col-md-12" >
                    <!-- Box Comment -->
                    <div class="box box-widget">
                        <div class='box-header with-border'>
                            <div class='user-block'>
                                
                                <h2>{{ $resut -> title }}</h2>
                                <span class='description'>{{ date('Y-m-d',$resut -> time )}}</span>
                                
                                <h4>发表者:{{ $resut -> username }}</h4>
                            </div><!-- /.user-block -->
                           
                        </div><!-- /.box-header -->
                        <div class='box-body'>
                            <!-- post text -->                            
                            <p>{{ $resut -> content }}</p>                                
                        </div><!-- /.box-body -->
                        @foreach($data as $post)
                        <div class='box-footer box-comments'>
                            <div class='box-comment'>
                                <!-- User image -->
                               <h4>{{ $post -> username}}</h4>
                      			<span> {{date('Y-m-d',$post -> ctime)}}</span><!-- /.username -->
                                <p id='content1'> {{ $post -> content }}</p>
                                <div id="bianji" style="display:none" >{{ $post -> id}}</div>
                                 <button id='btnEdit'>编辑</button>&nbsp;
                                <!--  <a href="{{ url('/admin/topic/ajaxPostdelete') }}/{{ $post -> id }}"><button class='btn btn-default btn-xs'>删除</button></a> -->
                                 <div id='message'></div>
                            </div><!-- /.comment-text -->
                        </div><!-- /.box-comment -->
                        @endforeach   
                        <div class="box-footer" id="postEdit" style="display:none">
                                <div class="form-group" id="content">
                                    <label for="exampleInputFile">回复内容</label>
                                    <!-- 加载编辑器的容器 -->
                                    <script style="width:100%;height:200px;" id="container" name="content" class="neirong" type="text/plain"></script>
                                        
                                    <!-- 配置文件 -->
                                    <script type="text/javascript" src="{{ url('/ue/ueditor.config.js') }}"></script>
                                    <!-- 编辑器源码文件 -->
                                    <script type="text/javascript" src="{{ url('/ue/ueditor.all.js') }}"></script>
                                    <!-- 实例化编辑器 -->
                                    <script type="text/javascript">

                                        var ue = UE.getEditor('container');
                                       
										// document.getElementById('container').innerHTML=$(this).prev().prev().html();
                                    </script>
                                     
                                </div> 
                              
                                <button id="sub">提交</button>
                              
                           
                        </div><!-- /.box-footer -->
                    </div><!-- /.box -->
        </div><!-- /.col -->
    </div>
</div>
             <script type="text/javascript">
             	window.onload = function()
       			{
		            $.ajaxSetup({
		                    headers: {
		                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		                    }
		            });

		            //添加事件
		            $('button[id=btnEdit]').click(edit);
        
					function edit(){ 	
						$("#postEdit").toggle(); 
                     ue.setContent($(this).prev().prev().html());
                     var id= $(this).prev().html();
                       
				    
                    $("#sub").on('click',function(){
                      var content = UE.getEditor('container').getContentTxt();
                        
                       // alert(id);
                         //发送ajax
                        $.post('/admin/topic/ajaxPostUpdate',{id:id,content:content},function(data){
                                

                        if(data == '0')
                        {
                            alert('编辑成功');
                            // $('p[id=message]').html('内容编辑成功'); 
                            // alert('内容编辑成功');
                        }else
                        {
                            // alert(111111111);
                            // $('p[id=message]').html('内容编辑失败');
                             //alert('内容编辑失败');
                        }
                    },'json');
                   
                    
                        });
                    }
				    
		        }
		       
             </script>
@endsection