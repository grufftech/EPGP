<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Drunk Tanks EPGP Stats</title>
	</style>
</head>
<body>
	<?php print_r($character);?>
	<h1> Give Loot To {{$character->name}}</h1>
	{{Form::open(array('action' => array('AdminController@giveLootPost', $character->id)))}}
	<label>url</label>
	{{ Form::text('url','',array('class'=>'form-control','placeholder'=>'jabbitURL'));}}
	</div>
	{{ Form::submit('Parse!',array('class'=>'btn btn-default'));}}
	{{ Form::close() }}
</body>
</html>
[<a href='/logout'>logout</a>]



