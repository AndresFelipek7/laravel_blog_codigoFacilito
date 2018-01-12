<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticlesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('content');
			/*Se coloca unsigned para especificar que va hacer una relacion con otra tabla*/
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned();

			/*Aqui hacemos la relacion de los campos de 2 tablas
				1)foreign = Colocamos el nombre del campo de esta tabla que va hacer de llave foranea
				2)references = Colocamos el nombre del campo donde se va a relacionar
				3)on = Colcocamos el nombre de la tabla donde esta el segundo campo
				4)onDelete = Le podemos colocar que se elimine en cascada si es necesario( Esrto es opcional )
			Hay que recordar que esta es la forma de hacer una relacion de uno a uno*/
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
		Schema::dropIfExists('articles');
	}
}
