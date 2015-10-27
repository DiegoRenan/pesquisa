<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPROJProjetos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('PROJ_projetos', function(Blueprint $table)
		{
			$table->foreign('convenio_id')->references('idConvenio')->on('PROJ_convenios');
			$table->foreign('financiador_id')->references('idFinanciador')->on('PROJ_financiadores');
			$table->foreign('subAreaConhecimento_id')->references('id')->on('sub_areas_cnpq');
			$table->foreign('grupoPesquisa_id')->references('idGrupoPesquisa')->on('grupo_pesquisas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('PROJ_projetos', function(Blueprint $table)
		{
			$table->dropForeign('PROJ_projetos_grupoPesquisa_id_foreign');
			$table->dropForeign('PROJ_projetos_subAreaConhecimento_id_foreign');
			$table->dropForeign('PROJ_projetos_financiador_id_foreign');
			$table->dropForeign('PROJ_projetos_convenio_id_foreign');
		});
	}

}
