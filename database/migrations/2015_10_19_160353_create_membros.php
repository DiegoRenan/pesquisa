<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembros extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PROJ_membros', function(Blueprint $table)
		{
			$table->increments('idMembro');
			$table->string('nome_membro', 50);
			$table->string('cpf', 16);
			$table->string('instituicao', 150);
			$table->unsignedInteger('titulacao_id');
			$table->unsignedInteger('categoria_id');
			$table->timestamps();

			$table->foreign('titulacao_id')->references('id')->on('titulacaos');
			$table->foreign('categoria_id')->references('id')->on('categorias');
		});

		Schema::create('PROJ_projeto_PROJ_membro', function(Blueprint $table)
		{
			$table->unsignedInteger('projeto_id');
			$table->foreign('projeto_id')->references('idProjeto')->on('PROJ_projetos');

			$table->unsignedInteger('membro_id');
			$table->foreign('membro_id')->references('idMembro')->on('PROJ_membros');

            $table->string('cargaHoraria', 10);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('PROJ_projetos_PROJ_membros');
		Schema::drop('PROJ_membros');
	}

}
