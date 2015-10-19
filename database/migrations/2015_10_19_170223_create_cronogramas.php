<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PROJ_cronogramas', function(Blueprint $table)
		{
			$table->increments('idCronograma');
			$table->string('atividade', 250);
			$table->unsignedInteger('projeto_id');
			$table->foreign('projeto_id')->references('idProjeto')->on('PROJ_projetos');
		});

		Schema::create('PROJ_cronogramas_ano', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('anoMeses', 16);
			$table->unsignedInteger('cronograma_id');
			$table->foreign('cronograma_id')->references('idCronograma')->on('PROJ_cronogramas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('PROJ_cronogramas_ano');
		Schema::drop('PROJ_cronogramas');
	}

}
