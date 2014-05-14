<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Drunk Tanks EPGP Stats</title>
	</style>
</head>
<body>
		<h1> Login </h1>
		{{Form::open(array('action' => 'AdminController@loginPost'))}}
		<label>Username</label>
		{{ Form::text('username','',array('class'=>'form-control','placeholder'=>'charactername'));}}
		<label>Password</label>
		{{ Form::password('password','',array('class'=>'form-control','placeholder'=>'charactername'));}}
		</div>
		{{ Form::submit('Login!',array('class'=>'btn btn-default'));}}
		{{ Form::close() }}
</body>
</html>
