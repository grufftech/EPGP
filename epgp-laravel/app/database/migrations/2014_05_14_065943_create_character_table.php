<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::dropIfExists('users');
		Schema::dropIfExists('character_history');
		Schema::dropIfExists('characters');

		
		Schema::create('users', function($table)
		{
		    $table->increments('id');
			$table->string('name');
			$table->text('password');
			$table->text('remember_token');
		    $table->boolean('active')->default('1');
		    $table->timestamps();		
		});

		Schema::create('characters', function($table)
		{
		    $table->increments('id');
			$table->string('name')->unique();
		    $table->boolean('active')->default('1');
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->enum('class', array('warrior', 'engineer','stalker','medic','spellslinger','esper'));
			$table->integer('ep')->default('1');
			$table->integer('gp')->default('100');
		});

		Schema::create('character_history', function($table)
		{
			$table->increments('id');
			$table->integer('character_id')->unsigned();
			$table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->enum('change', array('ep','gp'));
			$table->integer('value');
			$table->text('reason');
			$table->text('loot_url')->nullable();
			$table->string('loot_name')->nullable();
			$table->string('loot_slot')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
		Schema::dropIfExists('character_history');
		Schema::dropIfExists('characters');
	}

}
