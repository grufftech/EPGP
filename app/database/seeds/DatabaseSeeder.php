<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('CharacterTableSeeder');
        $this->command->info('Character table seeded!');

        $this->call('UserTableSeeder');
        $this->command->info('Admin table seeded!');

        $this->call('OneRaidSeeder');
        $this->command->info('character_history table seeded!');
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
    }
}

class OneRaidSeeder extends Seeder {

    public function run()
    {
    	$this->gifPoints("One Raid Hour",100);
    	$this->gifPoints("One Raid Hour",100);
    	$this->gifPoints("Boss Kill",100);
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifPoints("One Raid Hour",100);
    	$this->gifPoints("Boss Kill",100);
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifPoints("One Raid Hour",100);
    	$this->gifPoints("Boss Kill",100);
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifPoints("One Raid Hour",100);
    	$this->gifPoints("One Raid Hour",100);
    	$this->gifPoints("Progression Boss Kill",200);
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifPoints("One Raid Hour",100);
    	$this->gifPoints("One Raid Hour",100);
    	$this->gifPoints("Progression Boss Kill (doubled)",400);
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifLoots();
    	$this->gifLoots();
    }

    public function gifPoints($reason,$value){
    	$characters = DB::table('characters')->select(DB::raw('*,ep/gp as pr'))->orderBy('pr','desc')->get();
		foreach($characters as $char){
			if (rand(0,100) < 90){
				DB::table('characters')->where('id', $char->id)->update(array('active' => 1,'ep' => $char->ep+$value));
				DB::table('character_history')->insert(
					array(
						'character_id' => $char->id,
						'change' => 'ep',
						'value' => $value,
						'reason' => $reason,
					)
				);
			}
		}
    }
    public function gifLoots(){
    	$char = DB::table('characters')->select(DB::raw('*,ep/gp as pr'))->orderBy('pr','desc')->first();

		$loots = ARRAY();
		$loots[] = ARRAY('loot_url' => 'http://www.jabbithole.com/items/psychedelic-claws-9206','loot_name'=>'Psychedelic Claws','loot_slot'=>'Weapon','loot_quality' => 'Superb');
		$loots[] = ARRAY('loot_url' => 'http://www.jabbithole.com/items/psychedelic-pistols-9207','loot_name'=>'Psychedelic Pistols','loot_slot'=>'Weapon','loot_quality' => 'Superb');
		$loots[] = ARRAY('loot_url' => 'http://www.jabbithole.com/items/ikthian-prototype-chestguard-9493','loot_name'=>'Ikthian Prototype Chestguard','loot_slot'=>'Chest','loot_quality' => 'Legendary');
		$loots[] = ARRAY('loot_url' => 'http://www.jabbithole.com/items/belligerents-bombarding-shin-plates-15412','loot_name'=>'Belligerent\'s Bombarding Shin Plates','loot_slot'=>'Legs','loot_quality' => 'Artifact');
		$loots[] = ARRAY('loot_url' => 'http://www.jabbithole.com/items/belligerents-bombarding-photon-cannon-15416','loot_name'=>'Belligerent\'s Bombarding Photon Cannon','loot_slot'=>'Weapon','loot_quality' => 'Legendary');
		$loots[] = ARRAY('loot_url' => 'http://www.jabbithole.com/items/data-projectionists-shroud-44487','loot_name'=>'Data Projectionist\'s Shroud','loot_slot'=>'Shoulder','loot_quality' => 'Superb');
		$loots[] = ARRAY('loot_url' => 'http://www.jabbithole.com/items/heretics-invigorating-striders-19128','loot_name'=>'Heretic\'s Invigorating Striders','loot_slot'=>'Feet','loot_quality' => 'Legendary');
		$loots[] = ARRAY('loot_url' => 'http://www.jabbithole.com/items/gloomskin-treads-40056','loot_name'=>'Gloomskin Treads','loot_slot'=>'Feet','loot_quality' => 'Superb');
		$loots[] = ARRAY('loot_url' => 'http://www.jabbithole.com/items/panzerschreck-2708','loot_name'=>'panzerschreck','loot_slot'=>'Weapon','loot_quality' => 'Superb');
		$loots[] = ARRAY('loot_url' => 'http://www.jabbithole.com/items/hardened-carapace-shoulders-40051','loot_name'=>'Hardened Carapace Shoulders','loot_slot'=>'Shoulder','loot_quality' => 'Artifact');
		$lootid = rand(0,8);
		$item_value = $this->calculateValue($loots[$lootid]['loot_quality'],$loots[$lootid]['loot_slot']);
		DB::table('character_history')->insert(
			array(
				'character_id' => $char->id,
				'change' => 'gp',
				'value' => $item_value,
				'reason' => "Loot",
				'loot_url' => $loots[$lootid]['loot_url'],
				'loot_name' => $loots[$lootid]['loot_name'],
				'loot_slot' => $loots[$lootid]['loot_slot'],
			)
		);

		DB::table('characters')
            ->where('id', $char->id)
            ->update(array('gp' => $char->gp + $item_value));

    }

	public function calculateValue($quality,$type){
		$basePower = 50;

		switch($quality){
			case "Inferior":
				$qualityMultiplier = 0; 
				break;
			case "Average":
				$qualityMultiplier = 0; 
				break;
			case "Good":
				$qualityMultiplier = 0; 
				break;
			case "Excellent":
				$qualityMultiplier = 1; 
				break;
			case "Superb":
				$qualityMultiplier = 2; 
				break;
			case "Legendary":
				$qualityMultiplier = 3; 
				break;
			case "Artifact":
				$qualityMultiplier = 5; 
				break;
		}

		switch($type){
			case "Weapon":
				$typeMultiplier = 1.5; 
				break;
			case "Shields":
				$typeMultiplier = 1.25; 
				break;
			default:
				$typeMultiplier = 1; 
				break;	
		}	

		return $basePower * $qualityMultiplier * $typeMultiplier; 
	}
}


class UserTableSeeder extends Seeder {

    public function run()
    {
		/* Use this line to seed the database with a admin user. 
			username: admin
			password: secret
		*/
		DB::table('users')->insert(array(array('name' => 'admin', 'password' => '$2y$10$K/jK9byNzpJPKd24zIqow.Gc3Ns5ryrVUiWixv31XXqwq08id6tZ.')));
    }
}