<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnexos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PROJ_anexos', function(Blueprint $table)
		{
			$table->increments('idAnexos');
			$table->string('nome', 250);
			$table->text('arquivo');
			$table->unsignedInteger('projeto_id');
			$table->foreign('projeto_id')->references('idProjeto')->on('PROJ_projetos');
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
		Schema::drop('PROJ_anexos');
	}

}
