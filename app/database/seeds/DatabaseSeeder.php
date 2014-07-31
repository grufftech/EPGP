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
			array('name' => 'Jolan', 'class' => 'Stalker','role'=>'tank','ep' => 1,'gp' => 100),
			array('name' => 'Daeke', 'class' => 'Warrior','role'=>'tank','ep' => 1,'gp' => 100),
			array('name' => 'Gruff', 'class' => 'Engineer','role'=>'tank','ep' => 1,'gp' => 100),
			array('name' => 'Gilby', 'class' => 'Esper','role'=>'heal','ep' => 1,'gp' => 100),
			array('name' => 'Kyior', 'class' => 'Spellslinger','role'=>'heal','ep' => 1,'gp' => 100),
			array('name' => 'Plumpo', 'class' => 'Medic','role'=>'heal','ep' => 1,'gp' => 100),
			array('name' => 'DruZod', 'class' => 'Stalker','role'=>'tank','ep' => 1,'gp' => 100),
			array('name' => 'Talvon', 'class' => 'Warrior','role'=>'tank','ep' => 1,'gp' => 100),
			array('name' => 'Xinit', 'class' => 'Engineer','role'=>'tank','ep' => 1,'gp' => 100),
			array('name' => 'Random', 'class' => 'Esper','role'=>'tank','ep' => 1,'gp' => 100),
			array('name' => 'Folkmore', 'class' => 'Spellslinger','role'=>'heal','ep' => 1,'gp' => 100),
			array('name' => 'Lisassa', 'class' => 'Esper','role'=>'heal','ep' => 1,'gp' => 100),
			array('name' => 'Churchill', 'class' => 'Spellslinger','role'=>'heal','ep' => 1,'gp' => 100)
		));
			
        DB::table('characters')->insert(array(
			array('name' => 'Lirtadar', 'class' => 'Medic','ep' => 1,'gp' => 100),
			array('name' => 'Marirrast', 'class' => 'Stalker','ep' => 1,'gp' => 100),
			array('name' => 'Frichistan', 'class' => 'Warrior','ep' => 1,'gp' => 100),
			array('name' => 'Iskilsaya', 'class' => 'Engineer','ep' => 1,'gp' => 100),
			array('name' => 'Kachek', 'class' => 'Warrior','ep' => 1,'gp' => 100),
			array('name' => 'Azilek', 'class' => 'Engineer','ep' => 1,'gp' => 100),
			array('name' => 'Kabim', 'class' => 'Esper','ep' => 1,'gp' => 100),
			array('name' => 'Jolajich', 'class' => 'Spellslinger','ep' => 1,'gp' => 100),
			array('name' => 'Lanaqa', 'class' => 'Medic','ep' => 1,'gp' => 100),
			array('name' => 'Tztomelja', 'class' => 'Stalker','ep' => 1,'gp' => 100),
			array('name' => 'Etzlawek', 'class' => 'Warrior','ep' => 1,'gp' => 100),
			array('name' => 'Izlajal', 'class' => 'Engineer','ep' => 1,'gp' => 100),
			array('name' => 'Ixam', 'class' => 'Esper','ep' => 1,'gp' => 100),
			array('name' => 'Tsal', 'class' => 'Spellslinger','ep' => 1,'gp' => 100),
			array('name' => 'Kabimek', 'class' => 'Esper','ep' => 1,'gp' => 100),
			array('name' => 'Lanil', 'class' => 'Spellslinger','ep' => 1,'gp' => 100),
			array('name' => 'Azende', 'class' => 'Medic','ep' => 1,'gp' => 100),
			array('name' => 'Jolypam', 'class' => 'Stalker','ep' => 1,'gp' => 100),
			array('name' => 'Kachende', 'class' => 'Warrior','ep' => 1,'gp' => 100),
			array('name' => 'Izlayam', 'class' => 'Engineer','ep' => 1,'gp' => 100),
			array('name' => 'Isaias', 'class' => 'Stalker','ep' => 1,'gp' => 100),
			array('name' => 'Celia', 'class' => 'Warrior','ep' => 1,'gp' => 100),
			array('name' => 'Tamica', 'class' => 'Engineer','ep' => 1,'gp' => 100),
			array('name' => 'Isidra', 'class' => 'Esper','ep' => 1,'gp' => 100),
			array('name' => 'Suzanna', 'class' => 'Spellslinger','ep' => 1,'gp' => 100),
			array('name' => 'Katy', 'class' => 'Medic','ep' => 1,'gp' => 100),
			array('name' => 'Bruce', 'class' => 'Stalker','ep' => 1,'gp' => 100),
			array('name' => 'Bryan', 'class' => 'Warrior','ep' => 1,'gp' => 100),
			array('name' => 'Bernardo', 'class' => 'Engineer','ep' => 1,'gp' => 100),
			array('name' => 'Corey', 'class' => 'Esper','ep' => 1,'gp' => 100),
			array('name' => 'Zack', 'class' => 'Spellslinger','ep' => 1,'gp' => 100),
			array('name' => 'Noe', 'class' => 'Esper','ep' => 1,'gp' => 100),
			array('name' => 'Wade', 'class' => 'Spellslinger','ep' => 1,'gp' => 100),
			array('name' => 'Armando', 'class' => 'Medic','ep' => 1,'gp' => 100),
			array('name' => 'Donovan', 'class' => 'Stalker','ep' => 1,'gp' => 100),
			array('name' => 'Williams', 'class' => 'Warrior','ep' => 1,'gp' => 100),
			array('name' => 'Rolando', 'class' => 'Engineer','ep' => 1,'gp' => 100),
			array('name' => 'Jay', 'class' => 'Warrior','ep' => 1,'gp' => 100),
			array('name' => 'Octavio', 'class' => 'Engineer','ep' => 1,'gp' => 100),
			array('name' => 'Xoolia', 'class' => 'Esper','ep' => 1,'gp' => 100),
			array('name' => 'Olivander', 'class' => 'Spellslinger','ep' => 1,'gp' => 100),
			array('name' => 'Boondock', 'class' => 'Medic','ep' => 1,'gp' => 100),
			array('name' => 'Shaldirn', 'class' => 'Stalker','ep' => 1,'gp' => 100),
			array('name' => 'Runlevel6', 'class' => 'Warrior','ep' => 1,'gp' => 100),
			array('name' => 'Grufftech', 'class' => 'Engineer','ep' => 1,'gp' => 100),
			array('name' => 'Malgus', 'class' => 'Esper','ep' => 1,'gp' => 100),
			array('name' => 'Vossryn', 'class' => 'Spellslinger','ep' => 1,'gp' => 100),
			array('name' => 'Boner', 'class' => 'Esper','ep' => 1,'gp' => 100),
			array('name' => 'Soup', 'class' => 'Spellslinger','ep' => 1,'gp' => 100),
			array('name' => 'Cheez', 'class' => 'Medic','ep' => 1,'gp' => 100),
			array('name' => 'Jolly', 'class' => 'Stalker','ep' => 1,'gp' => 100),
			array('name' => 'Easter', 'class' => 'Warrior','ep' => 1,'gp' => 100),
			array('name' => 'Taunts', 'class' => 'Engineer','ep' => 1,'gp' => 100),
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

		$loots = ARRAY(
			'http://wildstar.datminer.com/ptr/item/40095/Project-Legacy:-The-Dreamer',
			'http://wildstar.datminer.com/ptr/item/40094/Project-Legacy:-The-Contrarian',
			'http://wildstar.datminer.com/ptr/item/40093/Project-Legacy:-The-Shadowsoul',
			'http://wildstar.datminer.com/ptr/item/40092/Project-Legacy:-The-Chirurgeon',
			'http://wildstar.datminer.com/ptr/item/40091/Project-Legacy:-The-Wright',
			'http://wildstar.datminer.com/ptr/item/44527/Primary-Source-Chest-Guard',
			'http://wildstar.datminer.com/ptr/item/39939/Neuroweave-Bodysuit',
			'http://wildstar.datminer.com/ptr/item/39928/Neuromancer-Regalia',
			'http://wildstar.datminer.com/ptr/item/39909/Coat-of-Refraction',
			'http://wildstar.datminer.com/ptr/item/39827/Pedant-Treads',
			'http://wildstar.datminer.com/ptr/item/39555/Phagewarped-Leg-Plates',
			'http://wildstar.datminer.com/ptr/item/39441/Hyper-Regenerative-Scrubs',
			'http://wildstar.datminer.com/ptr/item/40082/Intrusive-Espernetic-Neuroblade',
			'http://wildstar.datminer.com/ptr/item/20297/Emancipator\'s-Fusillade-Assist-Module',
			'http://wildstar.datminer.com/ptr/item/20310/Emancipator\'s-Invigorating-Assist-Module',
			'http://wildstar.datminer.com/ptr/item/39255/Retributor\'s-Invasive-Analyzer',
			'http://wildstar.datminer.com/ptr/item/39907/Laser-Hash-Shielding',
			'http://wildstar.datminer.com/ptr/item/22865/Occultist\'s-Meditative-Energy-Shield',
			'http://wildstar.datminer.com/ptr/item/22759/Precursor\'s-Afflicting-Energy-Shield',
			'http://wildstar.datminer.com/ptr/item/39792/Wind-Funnel-Shield');

		$lootid = rand(0,15);

		$page = file_get_contents($loots[$lootid]);
		//echo $page;
		$itemName = $this->getName($page);
		$itemType = $this->getType($page);
		$itemQuality = $this->getQuality($page);
		$itemCost = $this->getValue($page);
		DB::table('character_history')->insert(
			array(
				'character_id' => $char->id,
				'change' => 'gp',
				'value' => $itemCost,
				'reason' => "Loot",
				'loot_url' => $loots[$lootid],
				'loot_name' => $itemName,
				'loot_slot' => $itemType,
			)
		);

		DB::table('characters')
            ->where('id',$char->id)
            ->update(array('gp' => $char->gp + $itemCost));
    }


	public function decay(){
		$characters = DB::table('characters')->get();

		foreach ($characters as $char){
			$decayEPAmount = $char->ep*0.1*-1;
			$decayGPAmount = $char->gp*0.1*-1;
			DB::table('character_history')->insert(
				array(
					'character_id' => $char->id,
					'change' => 'ep',
					'value' => $decayEPAmount,
					'reason' => "10% EP Decay - Previous Value: ".$char->ep,
				)
			);
			DB::table('character_history')->insert(
				array(
					'character_id' => $char->id,
					'change' => 'gp',
					'value' => $decayGPAmount,
					'reason' => "10% GP Decay - Previous Value: ".$char->gp,
				)
			);

			$newEP = $char->ep + $decayEPAmount;
			$newGP = $char->gp + $decayGPAmount;
			DB::table('characters')->where('id', $char->id)->update(array('ep' => $newEP,'gp' => $newGP));
		}

		return Redirect::intended('admin');
		
	}


	public function getName($code){
		$matches = ARRAY();
		preg_match('/<title>(.*) - Item - Wildstar<\/title>/',$code,$matches);
		if ($matches){
			return trim(ltrim($matches[1]));
		}
	}

	public function getType($code){
		$matches = ARRAY();
		preg_match('/<tr>[\s]*<td>[\s]*<span class="blue">[\s]*Slot[\s]*<\/span>[\s]*<\/td>[\s]*<td class="grey" style="text-align: right;">[\s]*(.*?)[\s]*<\/td>[\s]*<\/tr>/',$code,$matches);
		if ($matches){
			return trim(ltrim($matches[1]));
		}
	}

	public function getQuality($code){
		$matches = ARRAY();
		preg_match('/<span class="bind_flags" style="color:#.{0,6}?">[\s]*(.*?)[\s]*<\/span>/',$code,$matches);
		if ($matches){
			return trim(ltrim($matches[1]));
		}
	}

	public function getValue($code){
		$matches = ARRAY();
		preg_match('/<tr>[\s]*<td>[\s]*<span class="blue">[\s]*Power[\s]*<\/span>[\s]*<\/td>[\s]*<td class="grey" style="text-align: right;">[\s]*(.*?)[\s]*<\/td>[\s]*<\/tr>/',$code,$matches);
		if ($matches){
			return trim(ltrim($matches[1]));
		}
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