<?php

class HomeController extends BaseController {

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
		$characters = DB::table('characters')->select(DB::raw('*,ep/gp as pr'))->orderBy('pr','desc')->get();
		$loots = DB::table('character_history')->where('change','gp')->get();
		return View::make('home',compact('characters','loots'));
	}

	public function characterHistory($characterID){
		$character = DB::table('characters')->where('id',$characterID)->first();
		$history = DB::table('character_history')->where('character_id',$characterID)->get();
		return View::make('history',compact('character','history'));
	}
	public function newCharacterPost()
	{
		DB::table('characters')->insert(
			array('name' => Input::get('name'), 'class' => Input::get('class'))
		);
		return Redirect::action('HomeController@showHomepage');
	}
	public function scrapeJabbit(){
		$url = Input::get('url');
	}
}
