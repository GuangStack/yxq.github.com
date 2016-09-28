<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>邮箱</title>
</head>
<body>
	<form method ='post' action = '{{ url("admin/reset/sendemail") }}'>
		
		{{csrf_field()}}
		
		@if(session('info'))
		
			{{session('info')}}
		
		@endif
		
		请输入您的邮箱：<input type = "text" name = 'email'><br>
		
		<button>发送邮件</button>



	</form>
</body>
</html>