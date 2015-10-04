<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubAreaConhecimentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PROJ_sub_areas_conhecimento', function(Blueprint $table)
		{
			$table->increments('idSubArea');
            $table->string('nome', 255);
			$table->unsignedInteger('area_id');

            $table->foreign('area_id')
                ->references('idArea')
                ->on('PROJ_areas_conhecimento')
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
		Schema::drop('PROJ_sub_areas_conhecimento');
	}

}
