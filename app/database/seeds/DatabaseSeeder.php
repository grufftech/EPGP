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
			array('name' => 'Jolan', 'class' => 'Stalker','role'=>'tank','ep' => 1,'gp' => 1),
			array('name' => 'Daeke', 'class' => 'Warrior','role'=>'tank','ep' => 1,'gp' => 1),
			array('name' => 'Gruff', 'class' => 'Engineer','role'=>'tank','ep' => 1,'gp' => 1),
			array('name' => 'Gilby', 'class' => 'Esper','role'=>'heal','ep' => 1,'gp' => 1),
			array('name' => 'Kyior', 'class' => 'Spellslinger','role'=>'heal','ep' => 1,'gp' => 1),
			array('name' => 'Plumpo', 'class' => 'Medic','role'=>'heal','ep' => 1,'gp' => 1),
			array('name' => 'DruZod', 'class' => 'Stalker','role'=>'tank','ep' => 1,'gp' => 1),
			array('name' => 'Talvon', 'class' => 'Warrior','role'=>'tank','ep' => 1,'gp' => 1),
			array('name' => 'Xinit', 'class' => 'Engineer','role'=>'tank','ep' => 1,'gp' => 1),
			array('name' => 'Random', 'class' => 'Esper','role'=>'tank','ep' => 1,'gp' => 1),
			array('name' => 'Folkmore', 'class' => 'Spellslinger','role'=>'heal','ep' => 1,'gp' => 1),
			array('name' => 'Lisassa', 'class' => 'Esper','role'=>'heal','ep' => 1,'gp' => 1),
			array('name' => 'Churchill', 'class' => 'Spellslinger','role'=>'heal','ep' => 1,'gp' => 1)
		));
        DB::table('characters')->insert(array(
			array('name' => 'Lirtadar', 'class' => 'Medic','ep' => 1,'gp' => 1),
			array('name' => 'Marirrast', 'class' => 'Stalker','ep' => 1,'gp' => 1),
			array('name' => 'Frichistan', 'class' => 'Warrior','ep' => 1,'gp' => 1),
			array('name' => 'Iskilsaya', 'class' => 'Engineer','ep' => 1,'gp' => 1),
			array('name' => 'Kachek', 'class' => 'Warrior','ep' => 1,'gp' => 1),
			array('name' => 'Azilek', 'class' => 'Engineer','ep' => 1,'gp' => 1),
			array('name' => 'Kabim', 'class' => 'Esper','ep' => 1,'gp' => 1),
			array('name' => 'Jolajich', 'class' => 'Spellslinger','ep' => 1,'gp' => 1),
			array('name' => 'Lanaqa', 'class' => 'Medic','ep' => 1,'gp' => 1),
			array('name' => 'Tztomelja', 'class' => 'Stalker','ep' => 1,'gp' => 1),
			array('name' => 'Etzlawek', 'class' => 'Warrior','ep' => 1,'gp' => 1),
			array('name' => 'Izlajal', 'class' => 'Engineer','ep' => 1,'gp' => 1),
			array('name' => 'Ixam', 'class' => 'Esper','ep' => 1,'gp' => 1),
			array('name' => 'Tsal', 'class' => 'Spellslinger','ep' => 1,'gp' => 1),
			array('name' => 'Kabimek', 'class' => 'Esper','ep' => 1,'gp' => 1),
			array('name' => 'Lanil', 'class' => 'Spellslinger','ep' => 1,'gp' => 1),
			array('name' => 'Azende', 'class' => 'Medic','ep' => 1,'gp' => 1),
			array('name' => 'Jolypam', 'class' => 'Stalker','ep' => 1,'gp' => 1),
			array('name' => 'Kachende', 'class' => 'Warrior','ep' => 1,'gp' => 1),
			array('name' => 'Izlayam', 'class' => 'Engineer','ep' => 1,'gp' => 1),
			array('name' => 'Isaias', 'class' => 'Stalker','ep' => 1,'gp' => 1),
			array('name' => 'Celia', 'class' => 'Warrior','ep' => 1,'gp' => 1),
			array('name' => 'Tamica', 'class' => 'Engineer','ep' => 1,'gp' => 1),
			array('name' => 'Isidra', 'class' => 'Esper','ep' => 1,'gp' => 1),
			array('name' => 'Suzanna', 'class' => 'Spellslinger','ep' => 1,'gp' => 1),
			array('name' => 'Katy', 'class' => 'Medic','ep' => 1,'gp' => 1),
			array('name' => 'Bruce', 'class' => 'Stalker','ep' => 1,'gp' => 1),
			array('name' => 'Bryan', 'class' => 'Warrior','ep' => 1,'gp' => 1),
			array('name' => 'Bernardo', 'class' => 'Engineer','ep' => 1,'gp' => 1),
			array('name' => 'Corey', 'class' => 'Esper','ep' => 1,'gp' => 1),
			array('name' => 'Zack', 'class' => 'Spellslinger','ep' => 1,'gp' => 1),
			array('name' => 'Noe', 'class' => 'Esper','ep' => 1,'gp' => 1),
			array('name' => 'Wade', 'class' => 'Spellslinger','ep' => 1,'gp' => 1),
			array('name' => 'Armando', 'class' => 'Medic','ep' => 1,'gp' => 1),
			array('name' => 'Donovan', 'class' => 'Stalker','ep' => 1,'gp' => 1),
			array('name' => 'Williams', 'class' => 'Warrior','ep' => 1,'gp' => 1),
			array('name' => 'Rolando', 'class' => 'Engineer','ep' => 1,'gp' => 1),
			array('name' => 'Jay', 'class' => 'Warrior','ep' => 1,'gp' => 1),
			array('name' => 'Octavio', 'class' => 'Engineer','ep' => 1,'gp' => 1),
			array('name' => 'Xoolia', 'class' => 'Esper','ep' => 1,'gp' => 1),
			array('name' => 'Olivander', 'class' => 'Spellslinger','ep' => 1,'gp' => 1),
			array('name' => 'Boondock', 'class' => 'Medic','ep' => 1,'gp' => 1),
			array('name' => 'Shaldirn', 'class' => 'Stalker','ep' => 1,'gp' => 1),
			array('name' => 'Runlevel6', 'class' => 'Warrior','ep' => 1,'gp' => 1),
			array('name' => 'Grufftech', 'class' => 'Engineer','ep' => 1,'gp' => 1),
			array('name' => 'Malgus', 'class' => 'Esper','ep' => 1,'gp' => 1),
			array('name' => 'Vossryn', 'class' => 'Spellslinger','ep' => 1,'gp' => 1),
			array('name' => 'Boner', 'class' => 'Esper','ep' => 1,'gp' => 1),
			array('name' => 'Soup', 'class' => 'Spellslinger','ep' => 1,'gp' => 1),
			array('name' => 'Cheez', 'class' => 'Medic','ep' => 1,'gp' => 1),
			array('name' => 'Jolly', 'class' => 'Stalker','ep' => 1,'gp' => 1),
			array('name' => 'Easter', 'class' => 'Warrior','ep' => 1,'gp' => 1),
			array('name' => 'Taunts', 'class' => 'Engineer','ep' => 1,'gp' => 1),
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
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("Boss Kill",100);
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->decay();
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("Boss Kill",100);
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
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
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->decay();
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("Boss Kill",100);
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
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
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->decay();
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("Boss Kill",100);
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
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
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->decay();
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("Boss Kill",100);
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
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
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->decay();
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("Boss Kill",100);
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
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
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->decay();
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("Boss Kill",100);
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
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
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
		$this->decay();
		$this->gifPoints("One Raid Hour",100);
		$this->gifPoints("Boss Kill",100);
		$this->gifLoots();
		$this->gifLoots();
		$this->gifLoots();
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
		$this->decay();
    }

    public function gifPoints($reason,$value){
    	$characters = DB::table('characters')->select(DB::raw('*,ep/gp as pr'))->orderBy('pr','desc')->get();
		foreach($characters as $char){
			if (rand(0,100) < 80){
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
		$lootid = rand(0,9);
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

	public function decay(){
		$characters = DB::table('characters')->get();

		foreach ($characters as $char){
		DB::table('characters')->where('id', $char->id)->update(array('ep' => $char->ep*0.9,'gp' => $char->gp*0.9));
		DB::table('character_history')->insert(
			array(
				'character_id' => $char->id,
				'change' => 'ep',
				'value' => $char->ep*0.1,
				'reason' => "10% EP Decay",
			)
		);
		DB::table('character_history')->insert(
			array(
				'character_id' => $char->id,
				'change' => 'gp',
				'value' => $char->gp*0.1,
				'reason' => "10% GP Decay",
			)
		);
		}

		return Redirect::intended('admin');
		
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