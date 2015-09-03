<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoPesquisasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grupo_pesquisas', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
			$table->timestamps();
		});

        Schema::create('pesquisador_has_grupo_pesquisa', function(Blueprint $table)
        {
            $table->unsignedInteger('pesquisador_id')
                ->references('id')->on('pesquisadors');

            $table->unsignedInteger('grupo_pesquisa_id')
                ->references('id')->on('grupo_pesquisas');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('pesquisador_has_grupo_pesquisa');
        Schema::drop('grupo_pesquisas');
	}

}
