<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('CharacterTableSeeder');

        $this->command->info('Character table seeded!');
    }

}

class CharacterTableSeeder extends Seeder {

    public function run()
    {
        DB::table('characters')->insert(array(
		    array('name' => 'Jolan', 'class' => 'Stalker','ep' => rand(0,1000),'gp' => rand(0,1000)),
		    array('name' => 'Daeke', 'class' => 'Warrior','ep' => rand(0,1000),'gp' => rand(0,1000)),
		    array('name' => 'Gruff', 'class' => 'Engineer','ep' => rand(0,1000),'gp' => rand(0,1000)),
		    array('name' => 'Gilby', 'class' => 'Esper','ep' => rand(0,1000),'gp' => rand(0,1000)),
		    array('name' => 'Kyior', 'class' => 'Spellslinger','ep' => rand(0,1000),'gp' => rand(0,1000)),
		    array('name' => 'Plumpo', 'class' => 'Medic','ep' => rand(0,1000),'gp' => rand(0,1000)),
		    array('name' => 'DruZod', 'class' => 'Stalker','ep' => rand(0,1000),'gp' => rand(0,1000)),
		    array('name' => 'Talvon', 'class' => 'Warrior','ep' => rand(0,1000),'gp' => rand(0,1000)),
		    array('name' => 'Xinit', 'class' => 'Engineer','ep' => rand(0,1000),'gp' => rand(0,1000)),
		    array('name' => 'Random', 'class' => 'Esper','ep' => rand(0,1000),'gp' => rand(0,1000)),
		    array('name' => 'Folkmore', 'class' => 'Spellslinger','ep' => rand(0,1000),'gp' => rand(0,1000))
		));

		/* Use this line to seed the database with a admin user. */
		//DB::table('users')->insert(array(array('name' => '', 'password' => '')));
    }

}