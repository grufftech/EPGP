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
		$loots = DB::table('character_history')
            ->join('characters', 'characters.id', '=', 'character_history.character_id')
            ->select('character_history.*','characters.name')
			->whereNotNull('loot_url')
			->orderBy('id','desc')
			->take(10)
			->get();
		return View::make('home',compact('characters','loots'));
	}

	public function characterHistory($characterID){
		$character = DB::table('characters')->where('id',$characterID)->first();
		$history = DB::table('character_history')
            ->join('characters', 'characters.id', '=', 'character_history.character_id')
            ->select('character_history.*','characters.name')
			->where('character_id',$characterID)
			->orderBy('id','desc')
			->get();
		return View::make('history',compact('character','history'));
	}
	public function newCharacterPost()
	{
		if (!Input::get('name')){
			return Redirect::back()->with('message', 'Character Name can\'t be empty.');
		}
		if (!Input::get('class')){
			return Redirect::back()->with('message', 'Please select a class.');
		}
		if (!Input::get('role')){
			return Redirect::back()->with('message', 'Please select a primary role.');
		}
		DB::table('characters')->insert(
			array('name' => Input::get('name'), 'class' => Input::get('class'),'role' => Input::get('role'))
		);
		return Redirect::action('HomeController@showHomepage');
	}
	public function scrapeJabbit(){
		$url = Input::get('url');
	}
}
