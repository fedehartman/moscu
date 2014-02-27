<?php

use Illuminate\Database\Migrations\Migration;

class CreateTwiterosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('twiteros', function($table){
			$table->engine = 'InnoDB';
			$table->create();
			$table->increments('id')->unsigned();			
			$table->string('tw_id');
			$table->string('usuario');
			$table->string('nombre');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('twiteros');
	}

}