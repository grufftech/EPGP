<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Drunk Tanks EPGP Stats</title>
	</style>
</head>
<body>
		<h1> EPGP Player Standings </h1>
		<?php foreach ($characters as $char){ 
			print_r($char);
			echo "<br>";
		} ?>

</body>
</html>
[<a href='/logout'>logout</a>]



		<h1> JabbitURL </h1>
		{{Form::open(array('action' => 'AdminController@scrapeJabbit'))}}
		<label>url</label>
		{{ Form::text('url','',array('class'=>'form-control','placeholder'=>'charactername'));}}
		</div>
		{{ Form::submit('Login!',array('class'=>'btn btn-default'));}}
		{{ Form::close() }}