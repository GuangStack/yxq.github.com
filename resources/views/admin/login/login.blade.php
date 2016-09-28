<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>一线牵交友网后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('/admin/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/admin/bootstrap/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/admin/bootstrap/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/iCheck/square/blue.css')}}">
    <link rel ="shotcut icon" href="/image/logo.icon">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page" style ="background:url('/image/loginb.jpg')">
<div class="login-box">
    <div class="login-logo" >
        <a href="../../index2.html" >
        <b style = "color:#801dae; font-size:20px">一线牵交友网后台管理系统</b>5.2.0</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        
        <p class="login-box-msg" style ="color:#801dae">请输入您的账号进行登录</p>
       
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        @endif
                       
                        @if(session('info'))
                        <div class="alert alert-danger alert-   dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i>  
                            警告
                            </h4>
                            {{session('info')}}
                         </div>
                        @endif
                        
        <form action="{{url('/admin/dologin')}}" method="post">
        {{csrf_field()}}
            <div class="form-group has-feedback">
                <input type="email" name = 'email' class="form-control" placeholder="请输入邮箱 手机号">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name = 'password' class="form-control" placeholder="请输入密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            
            <div class="form-group has-feedback">
                <input type="text" name="code" placeholder="请输入验证码" class="form-control" style="width: 320px;">
          <a onclick="javascript:re_captcha();" ><img src="{{url('/uplodes/2016-09-20_225028.png') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a>

            <script>  
              function re_captcha() 
              {
                $url = "{{ url('kit/captcha') }}";
                    $url = $url + "/" + Math.random();
                    document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
              }
            </script>


                <!-- <input type="text" name = 'code' class="form-control" placeholder="请输入验证码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                </div><!-- /.col -->
            </div>
        </form>
 
        <a href="{{url('admin/reset/forget')}}">忘记密码</a><br>
        

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="{{asset('/admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('/admin/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
