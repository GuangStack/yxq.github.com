
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

span
{
	color:red;
	font-size: 16px;
}


</style>


</head>
<body>

<!-- 标准头 开始 -->
<script type="text/javascript" src="{{url('/home/user/js/head_main.js')}}"></script> 
<!-- 标准头 结束 -->

<div class="my_infomation">
	<div class="navigation"><a href="http://www.jiayuan.com/usercp/" onmousedown="send_jy_pv2('editprofile|my_home|m|135859241');">我的佳缘</a>&nbsp;&gt;&nbsp;</div>
	<div class="borderbg"><img src="http://images1.jyimg.com/w4/usercp/i/i520/border_top.jpg" /></div>
	<div class="info_content">

		<!-- 中间开始 -->
				<!-- 中间开始 -->
		<div class="info_center">
	<div class="title">
		<strong>修改密码</strong>
	</div>
	<div class="mid_border">
		<div class="base_infomation" id="w_base_infomation">
		<p class="info_note">请认真填写您要修改的数据~</p>
	
	
	<form id="form_base" name="form_base" action="{{url('/home/user/updatepass')}}" method="post">
		
		{{csrf_field()}} 
			<!-- 基本资料 -->
			<input type = 'hidden' name = 'id' value = '{{session('user') -> user_id }}'>
			<div class="base_info">
					<tr>
						<td class="item" width="70" ><span >新密码：</span></td>
						<td width="360">
						<input type="text" name="password" class="text" onChange="select_changed()"/>
						</td>
					</tr>
			</div>	
					
				<div>
					<tr>
						<td class="item"><span >确认密码</span></td>
						<td><input type="text" class="text" id="qq" name="repassword"  onChange="select_changed()" onblur="check_validate('qq', this.value)" /></td>
					</tr>
		
					
					<tr>
						<td>&nbsp;</td>
						<td>
						
							<input type="submit"  value="修改">

						</td>
					</tr>
				</div>
			
			
			<!-- 联系信息结束 -->

			
			<!-- 弹层结束 -->
  </form>


			
		
			
		<!-- 右边结束 -->
	

</body>
</html>
