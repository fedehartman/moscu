<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuarios', function($table){
			$table->engine = 'InnoDB';
			$table->create();
			$table->increments('id')->unsigned();
			$table->string('nombre');
			$table->string('usuario')->unique();
			$table->string('clave');
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
		Schema::drop('usuarios');
	}

}