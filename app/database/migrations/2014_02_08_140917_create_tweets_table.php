<?php

use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tweets', function($table){
			$table->engine = 'InnoDB';
			$table->create();
			$table->increments('id')->unsigned();
			$table->integer('categoria_id')->unsigned()->nullable();			
			$table->integer('twitero_id')->unsigned()->nullable();		
			$table->string('tw_id');
			$table->string('texto');
			$table->datetime('fecha');
			$table->string('tw_id_usuario');
			$table->string('tw_nombre_usuario');
			$table->string('tw_usuario');
			$table->boolean('voto_repetido');
			$table->boolean('tweet_ano');
			$table->boolean('procesado');
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
		Schema::drop('tweets');
	}

}