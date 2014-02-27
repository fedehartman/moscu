<?php

use Illuminate\Database\Migrations\Migration;

class CreateConfiguracionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('configuraciones', function($table){
			$table->engine = 'InnoDB';
			$table->create();
			$table->increments('id');
			$table->string('opcion');
			$table->string('valor')->nullable();
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
		Schema::drop('configuraciones');
	}

}