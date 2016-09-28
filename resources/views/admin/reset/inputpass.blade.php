<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>请输入您的新密码</title>
</head>
<body>					　
	<form action = {{url('admin/reset/renew')}}  method = 'post'>
		{{ csrf_field() }}
		<input type = 'hidden' name = 'id' value = {{$res -> id}}>
		　新密码：<input type = 'password' name = 'password'><br/>
		确认密码：<input type = 'password' name = 'repassword'><br/>
		<button>重置</button>


	</form>
</body>
</html>