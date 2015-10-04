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
            $table->unsignedInteger('convenio_id');
            $table->unsignedInteger('financiador_id');
            $table->unsignedInteger('subAreaConhecimento_id');
            $table->unsignedInteger('grupoPesquisa_id');
            $table->unsignedInteger('pesquisador_id');
			$table->timestamps();
            $table->softDeletes();
		});

        Schema::create('PROJ_datas', function(Blueprint $table)
        {
            $table->increments('idData');
            $table->date('dataInicio');
            $table->unsignedInteger('duracao');

            $table->unsignedInteger('projeto_id');
            $table->foreign('projeto_id')
                ->references('PROJ_projetos')
                ->on('idProjeto')
                ->onDelete('CASCADE');
        });

        Schema::create('PROJ_palavras_chave', function(Blueprint $table)
        {
            $table->increments('idPalavra');
            $table->string('palavra', 25);


            $table->unsignedInteger('projeto_id');
            $table->foreign('projeto_id')
                ->references('PROJ_projetos')
                ->on('idProjeto')
                ->onDelete('CASCADE');
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
