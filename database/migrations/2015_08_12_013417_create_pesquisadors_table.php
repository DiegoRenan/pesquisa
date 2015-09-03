<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesquisadorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pesquisadors', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nome', 150);
            $table->string('matricula', 12);
            $table->char('cpf', 14);
            $table->date('dt_nascimento')->nullable();
            $table->string('rg', 60)->nullable();
            $table->string('pwd', 20)->nullable();
            $table->string('email', 120)->nullable();
            $table->char('telefone', 12)->nullable();
            $table->char('fax', 12)->nullable();
            $table->char('celular', 12)->nullable();
            $table->string('link_lattes', 250);
            $table->integer('flag')->default(1);
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
		Schema::drop('pesquisadors');
	}

}
