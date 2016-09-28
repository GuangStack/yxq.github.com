
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="keywords" content="交友,交友网,征婚交友,网上交友,征婚,征婚网,征婚交友网,交友中心,婚恋交友" />
<meta name="description" content="青春不常在，抓紧谈恋爱！缘分可遇也可求，该出手时就出手。世纪佳缘是严肃婚恋的交友平台，提供丰富多彩的交友征婚活动，1.7亿会员，让缘分千万里挑一！" />
<title>个人中心_一线牵交友网</title>
<link href="{{url('/home/user/css/style.css')}}" type="text/css" rel="stylesheet">
<link href="{{url('/home/user/css/modify-data.css')}}" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="{{url('/home/user/css/jy_ad.css')}}"/>
<style>
.mdy_layer{width:360px;padding:30px 0 10px 0;font-size:14px;line-height:150%}
.mdy_layer ul{margin:0;padding:0 0 0 60px;text-align:left;list-style:none}
.mdy_layer ul li{margin:0;padding:2px;list-style:none}
.mdy_layer ul li label{font-size:14px}
.mdy_layer ul li input{height:22px}
.mdy_layer ul li a.code{background:#fff8f9;border:1px solid #ffb5bf;color:#ff546a;display:inline-block;height:22px;text-align:center;text-decoration:none;vertical-align:1px;width:88px}
.mdy_layer div{height:30px;text-align:center}
.mdy_layer .tips{text-align:center;color:#F00;font-size:12px}
#mdy_mobile_tips{text-align:left;color:#F00;font-size:12px}
#mdy_location_tips{text-align:left;color:#F00;font-size:12px;width:250px;}
#mdy_idcard_tips{text-align:left;padding:0 30px 0 64px;color:#F00;font-size:12px}
.tips_link,a.tips_link{font-size:12px;color:#00F;text-decoration:none;padding-left:20px;}
.tips_link:hover,a.tips_link:hover{text-decoration:underline}
.tips_link:visited{color:#00F;text-decoration:none}
.tips_pay{font-size:12px;color:#999;text-decoration:underline}
.tips_pay:hover{text-decoration:underline}
.tips_pay:visited{color:#999;text-decoration:none}
#mdy_tips_infos{text-align:center;color:#F00;font-size:14px;padding:5px}
.button{vertical-align:middle;margin-top:-3px}
.base_infomation td.item {color: black;}
</style>


</head>
<body>

<!-- 标准头 开始 -->
<script type="text/javascript" src="{{url('/home/user/js/head_main.js')}}"></script> 
<!-- 标准头 结束 -->

<div class="my_infomation">
	<div class="navigation"><a href="http://www.jiayuan.com/usercp/" onmousedown="send_jy_pv2('editprofile|my_home|m|135859241');">我的佳缘</a>&nbsp;&gt;&nbsp;完善资料</div>
	<div class="borderbg"><img src="http://images1.jyimg.com/w4/usercp/i/i520/border_top.jpg" /></div>
	<div class="info_content">
		<!-- 左侧开始 -->
		<div class="info_left">
			<ul>
				

				<li class="ok" onmousedown="send_jy_pv2('editprofile|category_note|m|135859241');"><a href="{{url('home/user/index')}}">基本资料</a>

				</li>
				<li class="ok" onmousedown="send_jy_pv2('editprofile|category_note|m|135859241');"><a href="{{url('home/user/wanshan')}}">完善资料</a>

				</li>

				<li class="ok" onmousedown="send_jy_pv2('editprofile|category_note|m|135859241');"><a href="{{url('home/user/update')}}">修改资料</a>

				</li>
				
				<li class="ok" onmousedown="send_jy_pv2('editprofile|category_note|m|135859241');">

				<a href="{{url('home/user/password')}}/{{session('user') -> user_id }}">
				修改密码</a>

				</li>
			
			</ul>
			<div class="return_index">
				<a class="return_jy" href="http://www.jiayuan.com/usercp/index.php" onmousedown="send_jy_pv2('editprofile|return_home|m|135859241');">返回我的佳缘</a>
			</div>
		</div>
		<!-- 左侧结束 -->
		<!-- 中间开始 -->
				<!-- 中间开始 -->
		<div class="info_center">
	<div class="title">
		<strong>基本资料</strong>
	</div>
	<div class="mid_border">
		<div class="base_infomation" id="w_base_infomation">
		<p class="info_note">资料越完善，同等条件我们将优先推荐您哦~</p>
	

	<form id="form_base" name="form_base" action="{{url('/home/user/insert')}}" method="post">
		
		{{csrf_field()}} 
			<!-- 基本资料 -->
			<input type = 'hidden' name = 'id' value = '{{session('user') -> user_id }}'>
			<div class="base_info">
				<h2>为保方便客户管理，灰色字体信息不得随意修改</h2>
				<table colspan = "3" width="450" cellpadding="0" cellspacing="0" class="f-table">
					<tr>
						<td class="item"><span style="color:#666;">昵称:</span></td>
						<!--如果手机没有验证-->
						<td id="show_nickname" style="color:#666;">{{$data -> username}}</td>
						
					</tr>
					<tr>
						<td class="item"><span style="color:#666;">性别:</span></td>
						<td>
							 @if($data ->sex =='0')
                                    男
                             @endif

                             @if($data -> sex =='1')
                                   
                               女
                                   
                              @endif


						</td>
					</tr>
					<tr>
						<td class="item"><span class="ico_stars">*</span><span style="color:#666;">出生日期：</span></td>

						<td id="modify_age_tag" style="color:#666;">1992-06-15</td>
					</tr>
					
					
					<tr>
						<td class="item"><span class="ico_stars">*</span><span style="color:#666;">学历：</span></td>
						<td>

							@if($data -> education == '0')
										高中及以下
							@endif

							@if($data -> education == '1')
										大专
										@endif

							@if($data -> education == '2')
										本科
										@endif
							@if($data -> education == '3')
										双学士
							@endif

							@if($data -> education == '4')
										硕士
							@endif

							@if($data -> education == '5')
										博士
							@endif
							
							@if($data -> education == '5')
									博士后
							@endif




						</td>
					</tr>
					<tr>
						<td class="item"><span class="ico_stars">*</span><span style="color:#666;">婚姻状况:</span></td>
						<td>
							 
										@if($data -> marray == '0')
										未婚
										@endif

										@if($data -> marray == '1')
										离异
										@endif

										@if($data -> marray == '2')
										丧偶
										@endif



									
									
							
						</td>
					</tr>
					<tr>
						<td class="item"><span class="ico_stars">*</span><span >有无子女：</span></td>
						<td>
								@if( $data ->children == '0')
									无小孩
								@endif

								@if( $data ->children == '1')
									有小孩归自己
								@endif

								@if( $data ->children == '2')
									有小孩归对方
								@endif
								

						
						</td>
					</tr>
					
					<tr>
						<td class="item"><span class="ico_stars">*</span><span  >血型：</span></td>
						<td>
							@if( $data -> blood == '1')
								
								A型
							@endif

							@if( $data -> blood == '2')
								
								B型
							@endif

							@if( $data -> blood == '3')
								
								0型
							@endif

							@if( $data -> blood == '4')
								
								AB型
							@endif
								
						</td>
					</tr>
					<tr>
						<td class="item"><span class="ico_stars">*</span><span>民族：</span></td>
						<td>
							
								@if( $data -> nation == '1')
								
										汉族
								@endif

								@if( $data -> nation == '2')
								
										藏族
								@endif

								@if( $data -> nation  == '3')
								
									朝鲜族	
								@endif

								@if( $data -> nation  == '4')
								
										汉族
								@endif

								@if( $data -> nation  == '5')
								回族
										
								@endif

								@if( $data -> nation  == '6')
								
										满族
								@endif

								@if( $data -> nation == '7')
							
								维吾尔族
										
								@endif

								@if( $data -> nation == '8')
									壮族
								
								@endif
							
								@if( $data -> nation == '9')
									
								彝族
								@endif
								@if( $data -> nation == '10')
									
								其他民族
								@endif
									
									
									
						</td>
					</tr>						
					<tr>
						<td class="item"><span class="ico_stars">*</span><span  style="color:#666;">月薪：</span></td>
						<td>


										@if($data -> income =='0')
										
											2000元以下
										
										@endif
										@if($data -> income =='1')
										
											2000元 --5000元
										
										@endif
										
										@if($data -> income =='2')
										
											5000元 --10000元
										
										@endif

										@if($data -> income =='3')
										
											10000元--50000元
										
										@endif

										@if($data -> income =='4')
										
											50000元以上
										
										@endif


								
								<!-- <option label="2000～5000元" value="20">2000～5000元</option>
								<option label="5000～10000元" value="30">5000～10000元</option>
								<option label="10000～20000元" value="40" selected="selected">10000～20000元</option>
								<option label="20000～50000元" value="50">20000～50000元</option>
								<option label="50000元以上" value="60">50000元以上</option> -->
							</select>
					</td>
					</tr>
					<tr>
						<td class="item"><span class="ico_stars">*</span><span >居住情况：</span></td>
						<td>
							@if($data -> house == '0')
								暂未购房
							@endif

							@if($data -> house == '1')
								需要时购房
							@endif

							@if($data -> house == '2')
								已购房（有贷款）
							@endif
							
							@if($data -> house == '3')
								已购房（无贷款）
							@endif


							<!-- <select id="house" name="house" >
										<option value="0">--请选择--</option>
											<option label="暂未购房" value="0">暂未购房</option>
											<option label="需要时购置" value="1">需要时购置</option>
											<option label="已购房（有贷款）" value="2">已购房（有贷款）</option>
											<option label="已购房（无贷款）" value="3">已购房（无贷款）</option>
											<option label="与人合租" value="4">与人合租</option>
											<option label="独自租房" value="5">独自租房</option>
											<option label="与父母同住" value="6">与父母同住</option>
											<option label="住亲朋家" value="7">住亲朋家</option>
											<option label="住单位房" value="8">住单位房</option>

							</select> -->
						</td>
					</tr>
					<tr>
						<td class="item"><span class="ico_stars">*</span><span >购车情况：</span></td>
						<td>

						@if($data == '1')
						暂未购车
						@endif

						@if($data == '2')
						已购车（经济型）
						@endif

						@if($data == '3')
						已购车（中档型）
						@endif

						@if($data == '4')
						已购车（豪华型）
						@endif

						

							<!-- <select id="auto" name="car">
								<option value="0">--请选择--</option>
								<option label="暂未购车" value="0">暂未购车</option>
								<option label="已购车（经济型）" value="1">已购车（经济型）</option>
								<option label="已购车（中档型）" value="2">已购车（中档型）</option>
								<option label="已购车（豪华型）" value="3">已购车（豪华型）</option>
								<option label="单位用车" value="4">单位用车</option>
								<option label="需要时购置" value="5">需要时购置</option>

							</select> -->
						</td>
					</tr>					
				</table>
			</div>
			<!-- 联系信息 -->
			<div class="contact">
				<h1>联系信息</h1>
				<h2>以下资料我们将为您保密，不会显示在您的个人资料页面上。</h2>
				<table width="450" cellpadding="0" cellspacing="0">
					<tr>
						<td class="item" width="70"><span >真实姓名：</span></td>
						<td width="360">
						{{ $data -> realname}}
						</td>
					</tr>
					
					
					<tr>
						<td class="item"><span >QQ：</span></td>
						<td>{{$data -> qq}}</td>
					</tr>
		
					<tr>
						<td class="item"><span  >通讯地址：</span></td>
						<td>{{$data -> address}}</td>
					</tr>
					
					
					
				</table>
			</div>
			<!-- 联系信息结束 -->

			
			<!-- 弹层结束 -->
  </form>


			
		
			
		<!-- 右边结束 -->
	</div>
	<div class="borderbg"><img src="http://images1.jyimg.com/w4/usercp/i/border_bottom.jpg" /></div>
</div>


<script type="text/javascript" src="http://images1.jyimg.com/w4/global/j/foot.js"></script>

</body>
</html>
