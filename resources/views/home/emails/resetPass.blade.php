<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>找回密码的模板</title>
</head>
<body>
	<div style ="background:pink; height:200px;">
		<a href = "{{url('/home/reset/newpasss')}}/id/{{$res -> user_id}}/token/{{$res -> remember_token}}">点我重新设置密码</a>		

	</div>
</body>
</html>