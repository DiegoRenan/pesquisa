<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalavrasChave extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PROJ_palavras_chave', function(Blueprint $table)
		{
			$table->increments('idPalavra');
            $table->string('palavra', 25);


            $table->unsignedInteger('projeto_id');
            $table->foreign('projeto_id')
                ->references('idProjeto')
                ->on('PROJ_projetos')
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
		Schema::drop('PROJ_palavras_chave');
	}

}
