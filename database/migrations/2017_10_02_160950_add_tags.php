<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTags extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		/*Vamos a crea runa tabla Pivvot para poder relacionar articulos con tags
			Hay un estandar para colcocarle el nombre que consiste en los siguiente:
				1)Debe de estar en singular
				2)Debe de ser la union de los nombres de las dos tablas
			Debe de contener los dos ids de las tablas relacionadas*/
		Schema::create('article_tag', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('article_id')->unsigned();
			$table->integer('tag_id')->unsigned();

			$table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

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
		Schema::dropIfExists('article_tag');
		Schema::dropIfExists('tags');
	}
}
