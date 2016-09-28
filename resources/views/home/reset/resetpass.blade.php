<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    
    <title>一线牵登录页_一线牵交友网</title>
    <link rel="stylesheet" href="{{url('/home/css/base.css')}}"/>
    <link rel="stylesheet" href="{{url('/home/css/login.css')}}"/>
    <style type="text/css">
    .main{background-image:url('/home/img/nan_1.jpg')}
    
  </style>
  </head>
  <body onload="onloadPage();" onkeydown="bindEnter(event)">
    <div id="wrapper" class="wrapper">
      <div id="header" class="header">
        <div class="w fn-clear">
          <h1 class="logo">
          
            <span><img src="{{url('/img/logo_txt.png')}}" alt="严肃婚恋网站"/></span>
          </h1>
        </div>
      </div>
      <div id="main" class="main">
        <div class="w fn-clear">
			<div id="loginForm" class="loginForm tab-wrap">
				<ul class="loginTit tab-list fn-clear">
					<li class="default" id='password_login'>找回密码</li>
				
				</ul>
            <div class="loginInner">
              <div class="loginFalse" id="errorInfo" style="display: none;">
                <p id="errorInfop">
                  
                  
                </p>
              </div>
                <div class="tab-cent" id="login_form">
               
        <form name="login" id="login" method="post" action="{{ url('/home/reset/donew') }}" target="login_run">
	    		{{csrf_field()}}
            <input type = 'hidden' name = 'user_id' value = {{$res -> user_id }}>
                <div class="login_zh fn-clear">
                  
                  <label class="lab">设置新密码</label>
                  <div class="login_inpBox">
                    <input class="text" name="password" type="password" id="login"   placeholder="请输新密码" >
                    
                  </div>
               </div>

               <div class="login_zh fn-clear">
                  <label class="lab">确认新密码</label>
                  <div class="login_inpBox">
                    <input class="text" name="repassword" type="password" id="login"   placeholder="确认新密码" >
                    
                  </div>
                </div>
                
                <div class="btnsBox">
                 
                  <input type = 'image' src = '{{url("/home/img/sub.png")}}'>

                  
                </div>
              
        </form>
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
      
      </div>
    </div>
  </body>

</html>