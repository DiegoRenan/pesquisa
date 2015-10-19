<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PROJ_projetos', function(Blueprint $table)
		{
			$table->increments('idProjeto');
            $table->text('titulo');
            $table->longText('descricao');
            $table->longText('caracterizacao');
            $table->longText('objetivos');
            $table->longText('metodologia');
            $table->longText('referencias');
            
            /*References are created in migration alter_PROJ_projetos.php*/
            $table->unsignedInteger('convenio_id');
            $table->unsignedInteger('financiador_id');
            $table->unsignedInteger('subAreaConhecimento_id');
            $table->unsignedInteger('grupoPesquisa_id');
            
            $table->unsignedInteger('pesquisador_id');
            $table->foreign('pesquisador_id')->references('id')->on('pesquisadors');
			
			$table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('PROJ_projetos');
	}

}
