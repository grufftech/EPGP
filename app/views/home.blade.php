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

		<h1> Latest Loot Distribution </h1>

		<?php foreach ($loots as $loot){ 
			print_r($loot);
			echo "<br>";
		} ?>


		<h1> Create New Character </h1>
		{{Form::open(array('action' => 'HomeController@newCharacterPost'))}}
		<label>Name</label>
		{{ Form::text('name','',array('class'=>'form-control','placeholder'=>'charactername'));}}
		<label>Class</label>
		{{Form::select('class', array('warrior' => 'Warrior', 'stalker' => 'Stalker','engineer'=>'Engineer','medic'=>'Medic','spellslinger'=>'Spellslinger','esper'=>'Esper'));}}
		</div>
		{{ Form::submit('Create!',array('class'=>'btn btn-default'));}}
		{{ Form::close() }}
</body>
</html>
[<a href='/admin'>admin</a>]
