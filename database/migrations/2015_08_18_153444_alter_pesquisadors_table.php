<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPesquisadorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('pesquisadors', function(Blueprint $table)
        {
            $table->unsignedInteger('titulacao_id');

            $table->foreign('titulacao_id')
                ->references('id')
                ->on('titulacaos')
                ->after('flag');

            $table->unsignedInteger('categoria_id');

            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->after('titulacao_id');;

            $table->unsignedInteger('regime_trabalho_id');

            $table->foreign('regime_trabalho_id')
                ->references('id')
                ->on('regime_trabalhos')
                ->after('categoria_id');;

            $table->unsignedInteger('instituto_id')->nullable()->default(null);

            $table->foreign('instituto_id')
                ->references('id')
                ->on('institutos')
                ->after('regime_trabalho_id');;

            $table->unsignedInteger('departamento_id')->nullable()->default(null);

            $table->foreign('departamento_id')
                ->references('id')
                ->on('departamentos')
                ->after('instituto_id');;
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('pesquisadors', function(Blueprint $table)
        {
            $table->dropForeign('pesquisadors_titulacao_id_foreign');
            $table->dropForeign('pesquisadors_categoria_id_foreign');
            $table->dropForeign('pesquisadors_regime_trabalho_id_foreign');
            $table->dropForeign('pesquisadors_instituto_id_foreign');
            $table->dropForeign('pesquisadors_departamento_id_foreign');

            $table->dropColumn('titulacao_id');
            $table->dropColumn('categoria_id');
            $table->dropColumn('regime_trabalho_id');
            $table->dropColumn('instituto_id');
            $table->dropColumn('departamento_id');
        });
	}

}
