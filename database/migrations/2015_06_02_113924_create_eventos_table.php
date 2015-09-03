<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventos', function(Blueprint $table)
		{
            $table->integer('publicacao_id')->unsigned();

            $table->date('start');

            $table->date('end');

            $table->time('hour')->nullable();

            $table->string('place', 200);

            $table->boolean('alltime')->nullable()->default(false);

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
		Schema::drop('eventos');
	}

}
