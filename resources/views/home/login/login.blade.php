<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="keywords" content="交友,交友网,征婚交友,网上交友,征婚,征婚网,征婚交友网,交友中心,婚恋交友" />
    <meta name="description" content="青春不常在，抓紧谈恋爱！缘分可遇也可求，该出手时就出手。世纪佳缘是严肃婚恋的交友平台，提供丰富多彩的交友征婚活动，1.7亿会员，让缘分千万里挑一！" />
    <title>一线牵登录页_一线牵交友网</title>
    <link rel="stylesheet" href="./css/base.css"/>
    <link rel="stylesheet" href="./css/login.css"/>
    <style type="text/css">
    .main{background-image:url(./img/nv_1.jpg)}
    
  </style>
  </head>
  {{ session('info')}}
  <body onload="onloadPage();" onkeydown="bindEnter(event)">
    <div id="wrapper" class="wrapper">
      <div id="header" class="header">
        <div class="w fn-clear">
          <h1 class="logo">
           <script type="text/javascript">
            document.write('<a class="logo" href="http://www.jiayuan.com/" onmousedown="javascript:send_jy_pv2(\'log_m_to_jy\');" ><img height="70" src="./img/logo_1441767055.jpeg" alt="世纪佳缘" border="0" /></a>');
          </script>
            <span><img src="./img/logo_txt.png" alt="严肃婚恋网站"/></span>
          </h1>
        </div>
      </div>
      <div id="main" class="main">
        <div class="w fn-clear">
			<div id="loginForm" class="loginForm tab-wrap">
				<ul class="loginTit tab-list fn-clear">
					<li class="default" id='password_login'>会员登录</li>
					<li style='display:none;' id="quick_login_btn">快速登录</li>
				</ul>
            <div class="loginInner">
              <div class="loginFalse" id="errorInfo" style="display: none;">
                <p id="errorInfop">
                  <!-- <span class="f_red">登录失败！</span>您的密码过于简单，请登录后<a href="###">修改密码</a> -->
                  
                </p>
              </div>
                <div class="tab-cent" id="login_form">
                {{session('info')}}
        <form name="login" id="login" method="post" action="{{ url('/home/dologin') }}" target="login_run">
	    		{{csrf_field()}}

                <div class="login_zh fn-clear">
                  <label class="lab">登录帐号</label>
                  <div class="login_inpBox">
                    <label for="login_email" class="login_label">邮箱/ID/手机号</label>
                    <input class="text" name="phone" type="text" id="login_email" onfocus="clear_text(this);this.style.imeMode='disabled';" onblur="check_text(this);"  placeholder="请输入手机号" >
                    <span class="btnDel" id="btn_del" href="" onclick="delLoginMsg();" title="删除">删除</span>
                  </div>
                </div>
                <div class="login_mm fn-clear mT10">
                  <label class="lab">密<i class="f_white">密码</i>码</label>
                  <div class="login_inpBox">
                    <label for="login_password" class="login_label">密码</label>
                    <input class="text" type="password" name="password" autocomplete="off"  id="login_password" autocomplete="off">
                  </div>
                </div>
                <p class="loginSelf mT10">
                  <input type="checkbox" name="remem_pass" checked id="check_save" onclick="saveName(this);" />
                  <label><span>两周内自动登录</span></label>
                </p>
                <!-- <button type = 'submit'>登录</button> -->
                <!-- <input type="submit" value="登录"/> -->
                <div class="btnsBox">
                 <!--  <input type = 'image' src = '{{url("/home/img/login.png")}}'> -->
                <input type="submit" value="提交">
                </div>
              
        </form>
         <a class="forgMM" href='{{url('home/reset/forget')}}'>忘记密码</a>
					</div>
					<div class="tab-cent fn-hide">
						<!-- <form name="login_new" id="login_new" method="post" action="https://passport.jiayuan.com/dologin.php?pre_url=http://www.jiayuan.com/usercp/" target="login_run">
							<div class="login_zh_o fn-clear" style="margin-top:37px;">
								<label class="lab">手机号/邮箱</label>
								<div class="login_inpBox">
									<label for="login_quick" class="login_label">手机号/邮箱</label>
									<input class="text" name="name" autocomplete="off" type="text" id="login_quick" onfocus="clear_text(this);this.style.imeMode='disabled';" onblur="check_text(this);">
									<span class="btnDel" title="删除">删除</span>
								</div>
								<div class="login_codeBox fn-hide">
									<a href="javascript:;" class="login_code_btn" id="get_mobile_code">获取验证码</a>
								</div>
							</div>
							<div class="login_mm_o fn-clear mT10 fn-hide">
								<label class="lab">验证码</label>
								<div class="login_inpBox">
									<label for="login_code" class="login_label">验证码</label>
                                                                        <input id="login_code" name="login_mobile_code" autocomplete="off" type="text" value=""  class="te"/><span class="re" style="display: inline-block;"> </span>
                                                                        
								</div>
							</div>
							<div class="btnsBox">
								<a class="btnLogin" style="display: none;" id="login_btn_new" href="javascript:void(0);" onclick="send_jy_pv2('log_quick_btn_c');mysub_new();">登&nbsp;录</a>
								<a class="btnLogin" style="display: none;" id="send_email" href="javascript:void(0);" onclick="send_jy_pv2('send_emial_quick_btn_c');send_email();">发送邮件</a>
							</div>
                                <input type="hidden" name="sid" id="sid" value="71e57a" />
						</form> -->
					</div>
              <div class="openId">
               

              </div>
              <p class="goReg">
                <a href="{{url('home/register')}}" onmousedown="javascript:send_jy_pv2('log_m_to_reg');" >还不是会员？立即注册</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div id="footer" class="footer w">
        <div class="shareXF">
          <a href="http://xingfu.jiayuan.com/" onmousedown="javascript:send_jy_pv2('log_m_to_xingfu');" target="_blank" >我已成功征友，我要晒幸福</a>
        </div>
        <img src="">
      </div>
    </div>
  </body>

<script type="text/javascript" src="http://images1.jyimg.com/w4/common/j/jquery-1.7.2.min.js"></script>

<!--[if lte ie 6]>
<script type="text/javascript"> $(function() {var w = $(window).width(); 
  $(window).resize(function() {w = $(window).width(); wrapperMinWidth(); }); 
  function wrapperMinWidth() {$('#wrapper').css('width', w <= 950 ? 950 : 'auto'); } wrapperMinWidth(); }) </script> 
<![endif]-->

</html>