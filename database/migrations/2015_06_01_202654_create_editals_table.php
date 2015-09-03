<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('editals', function(Blueprint $table)
		{
            $table->integer('publicacao_id')->unsigned();
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
            $table->string('file',255);

            $table->foreign('publicacao_id')->references('id')->on('publicacaos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('editals');
	}

}
