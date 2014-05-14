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
		if (!Auth::check()){
		    // The user is logged in...
			return Redirect::intended('login');
		}else{
			$characters = DB::table('characters')->select(DB::raw('*,ep/gp as pr'))->orderBy('pr','desc')->get();
			return View::make('admin',compact('characters','loots'));
		}
	}

	
	public function login()
	{
		return View::make('login');
	}
	public function loginPost()
	{
		if (Auth::attempt(array('name' => Input::get('username'), 'password' => Input::get('password'))))
		{
			return Redirect::intended('admin');
		}else{
			echo "nope";
		}

	}
	public function logout(){
		Auth::logout();
		return Redirect::intended('/');
	}




	public function scrapeJabbit(){
		$url = Input::get('url');
		echo "URL: ".$url."<br>";
		$page = file_get_contents($url);
		$item_name = $this->jabbitName($page);
		echo "Name: ".$item_name."<br>";
		$item_quality = $this->jabbitQuality($page);
		echo "Quality: ".$item_quality."<br>";
		$item_type = $this->jabbitType($page);
		echo "Type: ".$item_type."<br>";
		echo "Value:".$this->calculateValue($item_quality,$item_type);
	}

	public function jabbitName($jabbit){
		$matches = ARRAY();
		preg_match('/<div class="jhttttt">(.*)<\/div>/',$jabbit,$matches);
		if ($matches[1]){
			return $matches[1];
		}else{
			return false;
		}
	}
	public function jabbitQuality($jabbit){
		$matches = ARRAY();
		preg_match('/<span class="q[0-9]">(.*)<\/span>/',$jabbit,$matches);
		if ($matches[1]){
			return $matches[1];
		}else{
			return false;
		}
	}
	public function jabbitType($jabbit){
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
