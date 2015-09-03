<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StuffTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        /* Tabela titulações */
        Schema::create('titulacaos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        /* Tabela categorias */
        Schema::create('categorias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        /* Tabela regime de trabalho */
        Schema::create('regime_trabalhos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        /* Tabela Campus */
        Schema::create('campus', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('sigla');
            $table->timestamps();
        });

        /* Tabela instituto */
        Schema::create('institutos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('sigla');
            $table->integer('campus_id')->unsigned();
            $table->foreign('campus_id')->references('id')->on('campus')->onDelete('CASCADE');
            $table->timestamps();
        });

        /* Tabela departamento */
        Schema::create('departamentos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('sigla');
            $table->integer('campus_id')->unsigned();
            $table->foreign('campus_id')->references('id')->on('campus')->onDelete('CASCADE');
            $table->timestamps();
        });

        /* Areas Cnpq departamento */
        Schema::create('areas_cnpq', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        /* Sub-Areas Cnpq departamento */
        Schema::create('sub_areas_cnpq', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas_cnpq')->onDelete('CASCADE');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('titulacaos');
        Schema::drop('categorias');
        Schema::drop('regime_trabalhos');
        Schema::drop('institutos');
        Schema::drop('departamentos');
        Schema::drop('campus');
        Schema::drop('sub_areas_cnpq');
        Schema::drop('areas_cnpq');
	}

}
