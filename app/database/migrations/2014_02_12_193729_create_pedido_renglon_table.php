<?php

use Illuminate\Database\Migrations\Migration;

class CreatePedidoRenglonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pedido_renglon', function($table){
			$table->engine = 'InnoDB';
			$table->create();
			$table->increments('id')->unsigned();
			$table->integer('pedido_id')->unsigned();
			$table->integer('producto_id')->unsigned();
			$table->integer('cantidad');
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
		Schema::drop('pedidos');
	}

}