<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PROJ_datas', function(Blueprint $table)
		{
			$table->increments('idData');
            $table->date('dataInicio');
            $table->unsignedInteger('duracao');

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
		Schema::drop('PROJ_datas');
	}

}
