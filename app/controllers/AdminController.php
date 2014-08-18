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
		$itemCost = $this->getValue($page);
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

	public function massSelectAll(){
		DB::table('characters')->update(array('active' => 1));
		return Redirect::intended('admin');
	}
	public function massClearAll(){
		DB::table('characters')->update(array('active' => 0));
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
		$itemCost = $this->getValue($page);
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

	public function getValue($code){
		if (!Auth::check()){return Redirect::intended('login');}
		$matches = ARRAY();
		preg_match('/<tr>[\s]*<td>[\s]*<span class="blue">[\s]*Power[\s]*<\/span>[\s]*<\/td>[\s]*<td class="grey" style="text-align: right;">[\s]*(.*?)[\s]*<\/td>[\s]*<\/tr>/',$code,$matches);
		if ($matches){
			return trim(ltrim($matches[1]));
		}
	}




	public function decay(){
		$characters = DB::table('characters')->get();

		foreach ($characters as $char){
		DB::table('characters')->where('id', $char->id)->update(array('ep' => $char->ep*0.8,'gp' => $char->gp*0.8));
		DB::table('character_history')->insert(
			array(
				'character_id' => $char->id,
				'change' => 'ep',
				'value' => $char->ep*0.2*-1,
				'reason' => "20% EP Decay - Previous EP: ".$char->ep,
			)
		);
		DB::table('character_history')->insert(
			array(
				'character_id' => $char->id,
				'change' => 'gp',
				'value' => $char->gp*0.2*-1,
				'reason' => "20% GP Decay - Previous GP: ".$char->gp,
			)
		);
		}

		return Redirect::intended('admin');
		
	}


	public function recalculateAll(){
		$characters = DB::table('characters')->get();
		foreach ($characters as $char){
			$this->recalculate($char->id);
		}
		return Redirect::intended('admin');
		
	}

	public function recalculate($id){
		$character = DB::table('characters')->where('id',$id)->get();
		$history = DB::table('character_history')->where('character_id',$id)->orderby('created_at',"asc")->get();
		// Base Characters start with 1/100 EP/GP.
		$characterEP = 1;
		$characterGP = 100;
		foreach ($history as $event){
			if ($event->change == "ep"){
				if (strpos($event->reason,"Decay")){
					$decayAmount = round($characterEP * 0.2 * -1); 
					DB::table('character_history')->where('id', $event->id)->update(array('reason' => "20% EP Decay - Previous EP: ".$characterEP,'value' => $decayAmount));
					$characterEP = $characterEP + $decayAmount;
				}else{
					$characterEP = $characterEP + $event->value;
				}

			}
			if ($event->change == "gp"){
				if (strpos($event->reason,"Decay")){
					$decayAmount = round($characterGP * 0.2 * -1); 
					DB::table('character_history')->where('id', $event->id)->update(array('reason' => "20% GP Decay - Previous GP: ".$characterGP,'value' => $decayAmount));
					$characterGP = $characterGP + $decayAmount;
				}else{
					$characterGP = $characterGP + $event->value;
				}

			}
		}

		DB::table('characters')->where('id', $id)->update(array('ep' => $characterEP,'gp' => $characterGP));
		echo "Character Updated.";
		
	}



	public function editHistory($historyID){
		if (!Auth::check()){return Redirect::intended('login');}
		$history = DB::table('character_history')->where('id',$historyID)->first();
		$character = DB::table('characters')->where('id',$history->character_id)->first();
		return View::make('editHistory',compact('history','character'));
	}
	public function editHistoryPost($historyID){
		if (!Auth::check()){return Redirect::intended('login');}
		DB::table('character_history')
            ->where('id', $historyID)
            ->update(array(
            	'created_at'=>Input::get('created_at'),
            	'change'=>Input::get('change'),
            	'value'=>Input::get('value'),
            	'reason'=>Input::get('reason'),
            	'loot_url'=>(Input::get('loot_url') == "" ? NULL : Input::get('loot_url')),
            	'loot_name'=>(Input::get('loot_name') == "" ? NULL : Input::get('loot_name')),
            	'loot_slot'=>(Input::get('loot_slot') == "" ? NULL : Input::get('loot_slot')),
            	)
            );

		return Redirect::intended('admin');
	}


	public function deleteHistory($historyID){
		if (!Auth::check()){return Redirect::intended('login');}
		DB::table('character_history')->where('id', $historyID)->delete();
		return Redirect::intended('admin');
	}


}
