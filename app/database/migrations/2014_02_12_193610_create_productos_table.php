<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('productos', function($table){
			$table->engine = 'InnoDB';
			$table->create();
			$table->increments('id')->unsigned();
			$table->string('categoria');
			$table->string('nombre');
			$table->text('descripcion');
			$table->string('imagen');
			$table->integer('precio');
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
		Schema::drop('productos');
	}

}