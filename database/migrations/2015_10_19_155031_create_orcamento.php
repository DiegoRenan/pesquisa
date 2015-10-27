<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcamento extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PROJ_orcamento', function(Blueprint $table)
		{
			$table->increments('idOrcamento');
			$table->string('materialConsumo', 150);
			$table->string('servicosPessoaFisica', 150);
			$table->string('servicosPessoaJuridica', 150);
			$table->string('obrasInstalacoes', 150);
			$table->string('equipamentoMaterial', 150);
			$table->unsignedInteger('projeto_id');
			$table->foreign('projeto_id')->references('idProjeto')->on('PROJ_projetos')->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('PROJ_orcamento');
	}

}
