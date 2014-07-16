<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHomepage()
	{
		if (!Auth::check()){return Redirect::intended('login');}
		$characters = DB::table('characters')->select(DB::raw('*,ep/gp as pr'))->orderBy('name','asc')->get();
		return View::make('admin',compact('characters','loots'));
	}
	public function login()	{
		return View::make('login');
	}
	public function loginPost()	{
		if (Auth::attempt(array('name' => Input::get('username'), 'password' => Input::get('password'))))
		{
			return Redirect::intended('admin');
		}else{
			return Redirect::intended('login');
		}
	}

	public function createUser(){
		echo $password = Hash::make(Input::get('password'));
	}

	public function logout(){
		Auth::logout();
		return Redirect::intended('/');
	}
	
	/*public function photosEdit($id){
		$photo = DB::table('prPhotos')->where('id',$id)->remember(0,'about.prPhoto'.$id)->first();
		$tags = DB::table('prPhotoTags')->remember(0,'about.prPhotoTags')->get();
		return View::make('backend.press.photosEdit',compact('photo','tags'));
	}*/

	public function deleteCharacter($characterID){
		if (!Auth::check()){return Redirect::intended('login');}
		DB::table('characters')->where('id', $characterID)->delete();
		return Redirect::intended('admin');
	}
	public function editCharacter($characterID){
		if (!Auth::check()){return Redirect::intended('login');}
		$character = DB::table('characters')->where('id',$characterID)->first();
		return View::make('editCharacter',compact('character'));
	}
	public function editCharacterPost($characterID){
		if (!Auth::check()){return Redirect::intended('login');}
		$character = DB::table('characters')->where('id',$characterID)->first();
		
		DB::table('characters')
            ->where('id', $character->id)
            ->update(array('name'=>Input::get('name'),'class'=>Input::get('class'),'role'=>Input::get('role')));

		return Redirect::intended('admin');
	}

	public function giveLoot($characterID){
		if (!Auth::check()){return Redirect::intended('login');}
		$character = DB::table('characters')->where('id',$characterID)->first();
		return View::make('giveloot',compact('character'));
	}
	public function giveLootPost($characterID){
		if (!Auth::check()){return Redirect::intended('login');}
		$character = DB::table('characters')->where('id',$characterID)->first();
		$url = Input::get('url');
		$page = file_get_contents($url);
		$itemName = $this->getName($page);
		$itemType = $this->getType($page);
		$itemQuality = $this->getQuality($page);
		$itemCost = $this->calculateValue($itemQuality,$itemType);
		DB::table('character_history')->insert(
			array(
				'character_id' => $character->id,
				'change' => 'gp',
				'value' => $itemCost,
				'reason' => "Loot",
				'loot_url' => $url,
				'loot_name' => $itemName,
				'loot_slot' => $itemType,
			)
		);

		DB::table('characters')
            ->where('id', $character->id)
            ->update(array('gp' => $character->gp + $itemCost));

		return Redirect::intended('admin');

	}

	public function modifyEffort($characterID){
		if (!Auth::check()){return Redirect::intended('login');}
		$character = DB::table('characters')->where('id',$characterID)->first();
		return View::make('modifyeffort',compact('character'));
	}
	public function modifyEffortPost($characterID){
		if (!Auth::check()){return Redirect::intended('login');}
		$character = DB::table('characters')->where('id',$characterID)->first();
		DB::table('character_history')->insert(
			array(
				'character_id' => $character->id,
				'change' => 'ep',
				'value' => Input::get('value'),
				'reason' => Input::get('reason'),
			)
		);

		DB::table('characters')
            ->where('id', $character->id)
            ->update(array('ep' => $character->ep + Input::get('value')));

		return Redirect::intended('admin');
	}


	public function massEffort(){
		if (!Auth::check()){return Redirect::intended('login');}
		$chars = Input::get("chars");

		switch(Input::get("new_effort")){
			case "start":
				$value = 40;
				$reason = "Early to Raid Bonus";
				break;
			case "end":
				$value = 60;
				$reason = "End of Raid Bonus";
				break;
			case "1hr":
				$value = 100;
				$reason = "1 Hour of Raiding";
				break;
			case "2hr":
				$value = 200;
				$reason = "2 Hours of Raiding";
				break;
			case "3hr":
				$value = 300;
				$reason = "3 Hours of Raiding";
				break;
			case "4hr":
				$value = 400;
				$reason = "4 Hours of Raiding";
				break;
			case "boss":
				$value = 100;
				$reason = "Boss Kill";
				break;
			case "bigboss":
				$value = 200;
				$reason = "Progression Boss Kill";
				break;
			case "rapeboss":
				$value = 400;
				$reason = "Progression Boss Kill (doubled)";
				break;
			case "attunement":
				$value = 200;
				$reason = "Guild Attunement Attendence Bonus";
				break;
		}	

		$characters = DB::table('characters')->select(DB::raw('*,ep/gp as pr'))->orderBy('pr','desc')->get();
		foreach ($characters as $char){
			if (in_array($char->id,$chars)){
				DB::table('characters')->where('id', $char->id)->update(array('active' => 1,'ep' => $char->ep+$value));
				DB::table('character_history')->insert(
					array(
						'character_id' => $char->id,
						'change' => 'ep',
						'value' => $value,
						'reason' => $reason,
					)
				);
			}else{
				// Set char inactive, continue.
				DB::table('characters')->where('id', $char->id)->update(array('active' => 0));
				continue;
			}
		}
		return Redirect::intended('admin');
	}

	public function scrape(){
		if (!Auth::check()){return Redirect::intended('login');}
		$url = Input::get('url');
		echo "URL: ".$url."<br>";
		$page = file_get_contents($url);
		$itemName = $this->getName($page);
		$itemType = $this->getType($page);
		$itemQuality = $this->getQuality($page);
		$itemCost = $this->calculateValue($itemQuality,$itemType);
		echo "Name: ".$itemName."<br>";
		echo "Type: ".$itemType."<br>";
		echo "Quality: ".$itemQuality."<br>";
		echo "Value: ".$itemCost."<br>";
		echo "<a href=/admin>Back</a><br>";
	}

	public function getName($code){
		if (!Auth::check()){return Redirect::intended('login');}
		$matches = ARRAY();
		preg_match('/<title>(.*) - Item - Wildstar<\/title>/',$code,$matches);
		if ($matches){
			return trim(ltrim($matches[1]));
		}
	}

	public function getType($code){
		if (!Auth::check()){return Redirect::intended('login');}
		$matches = ARRAY();
		preg_match('/<tr>[\s]*<td>[\s]*<span class="blue">[\s]*Slot[\s]*<\/span>[\s]*<\/td>[\s]*<td class="grey" style="text-align: right;">[\s]*(.*?)[\s]*<\/td>[\s]*<\/tr>/',$code,$matches);
		if ($matches){
			return trim(ltrim($matches[1]));
		}
	}

	public function getQuality($code){
		if (!Auth::check()){return Redirect::intended('login');}
		$matches = ARRAY();
		preg_match('/<span class="bind_flags" style="color:#.{0,6}?">[\s]*(.*?)[\s]*<\/span>/',$code,$matches);
		if ($matches){
			return trim(ltrim($matches[1]));
		}
	}


	public function calculateValue($quality,$type){
		if (!Auth::check()){return Redirect::intended('login');}
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
			case "Legendary ★":
				$qualityMultiplier = 3; 
				break;
			case "Legendary":
				$qualityMultiplier = 3; 
				break;
			case "Artifact":
				$qualityMultiplier = 5; 
				break;
			default:
				$qualityMultiplier = 0;
				break;
		}

		switch($type){
			case "WeaponPrimary":
				$typeMultiplier = 1.5; 
				break;
			case "ArmorShields":
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
