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
			$table->increments('id');
            $table->string('title', 200);
            $table->date('start');
            $table->date('end');
            $table->time('hour')
                ->nullable();
            $table->string('place', 200);
            $table->text('text');
            $table->boolean('alltime')
                ->nullable()
                ->default(false);
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
		Schema::drop('eventos');
	}

}
