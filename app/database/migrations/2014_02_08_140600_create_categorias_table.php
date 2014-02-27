<?php

use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categorias', function($table){
			$table->engine = 'InnoDB';
			$table->create();
			$table->increments('id')->unsigned();
			$table->string('nombre');
			$table->text('descripcion');
			$table->string('imagen');
			$table->string('palabras_claves');
			$table->string('sponsor_tipo');
			$table->string('sponsor');
			$table->string('sponsor_imagen');
			$table->string('boton_votar');
			$table->integer('orden');
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
		Schema::drop('categorias');
	}

}