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
			$table->increments('id');
            $table->string('title', 200);
            $table->string('source', 255)->nullable();
            $table->string('url',255)->nullable();
            $table->longText('text');
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
            $table->string('file',255);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');
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
