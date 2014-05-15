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
	public function logout(){
		Auth::logout();
		return Redirect::intended('/');
	}
	
	/*public function photosEdit($id){
		$photo = DB::table('prPhotos')->where('id',$id)->remember(0,'about.prPhoto'.$id)->first();
		$tags = DB::table('prPhotoTags')->remember(0,'about.prPhotoTags')->get();
		return View::make('backend.press.photosEdit',compact('photo','tags'));
	}*/

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
		$item_name = $this->jabbitName($page);
		$item_quality = $this->jabbitQuality($page);
		$item_type = $this->jabbitType($page);
		$item_value = $this->calculateValue($item_quality,$item_type);
		DB::table('character_history')->insert(
			array(
				'character_id' => $character->id,
				'change' => 'gp',
				'value' => $item_value,
				'reason' => "Loot",
				'loot_url' => $url,
				'loot_name' => $item_name,
				'loot_slot' => $item_type,
			)
		);

		DB::table('characters')
            ->where('id', $character->id)
            ->update(array('gp' => $character->gp + $item_value));

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
			case "1hr":
				$value = 100;
				$reason = "1 Hour of Raiding";
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



	public function scrapeJabbit(){
		if (!Auth::check()){return Redirect::intended('login');}
		$url = Input::get('url');
		echo "URL: ".$url."<br>";
		$page = file_get_contents($url);
		$item_name = $this->jabbitName($page);
		echo "Name: ".$item_name."<br>";
		$item_quality = $this->jabbitQuality($page);
		echo "Quality: ".$item_quality."<br>";
		$item_type = $this->jabbitType($page);
		echo "Type: ".$item_type."<br>";
		$item_value = $this->calculateValue($item_quality,$item_type);
		echo "Value:".$item_value."<br>";
	}

	public function jabbitName($jabbit){
		if (!Auth::check()){return Redirect::intended('login');}
		$matches = ARRAY();
		preg_match('/<div class="jhttttt">(.*)<\/div>/',$jabbit,$matches);
		if ($matches[1]){
			return $matches[1];
		}else{
			return false;
		}
	}
	public function jabbitQuality($jabbit){
		if (!Auth::check()){return Redirect::intended('login');}
		$matches = ARRAY();
		preg_match('/<span class="q[0-9]">(.*)<\/span>/',$jabbit,$matches);
		if ($matches[1]){
			return $matches[1];
		}else{
			return false;
		}
	}
	public function jabbitType($jabbit){
		if (!Auth::check()){return Redirect::intended('login');}
		$matches = ARRAY();
		preg_match('/<div class="jhtttts">(.*)<\/div>/',$jabbit,$matches);

		$weapon_array = ARRAY("Pistols","Claws","Paddles","Psyblade","Heavy Gun","Greatsword");
		if (in_array($matches[1],$weapon_array)){
			return "Weapon";
		}

		if ($matches[1] == "Energy Shield"){ return "Shields";}

		$match = explode("-",$matches[1]);
		return trim(ltrim($match[2]));

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
