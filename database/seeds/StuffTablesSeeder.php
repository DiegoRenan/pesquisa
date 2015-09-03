<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class StuffTablesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Vinicius Fernandes Brito',
            'email' => 'vinicius.fernandes.brito@gmail.com',
            'password' => bcrypt('senha1')
        ]);

        DB::table('roles')->insert(['id' => 1, 'name' => 'admin']);
        DB::table('roles')->insert(['id' => 2, 'name' => 'editor']);
        DB::table('roles')->insert(['id' => 3, 'name' => 'coordenador']);
        DB::table('roles')->insert(['id' => 4, 'name' => 'pesquisador']);

        DB::table('role_user')->insert(['role_id' => 1, 'user_id' => 1]);

        DB::table('titulacaos')->insert(['id' => 1, 'name' => 'DOUTOR']);
        DB::table('titulacaos')->insert(['id' => 2, 'name' => 'POS-DOUTOR']);
        DB::table('titulacaos')->insert(['id' => 3, 'name' => 'MESTRE']);
        DB::table('titulacaos')->insert(['id' => 4, 'name' => 'ESPECIALISTA']);
        DB::table('titulacaos')->insert(['id' => 5, 'name' => 'GRADUADO']);
        DB::table('titulacaos')->insert(['id' => 6, 'name' => 'ALUNO']);
        DB::table('titulacaos')->insert(['id' => 7, 'name' => 'DCR']);

        DB::table('categorias')->insert(['id' => 1, 'name' => 'PROFESSOR']);
        DB::table('categorias')->insert(['id' => 2, 'name' => 'PROFESSOR CONVIDADO']);
        DB::table('categorias')->insert(['id' => 3, 'name' => 'PROFESSOR SUBSTITUTO']);
        DB::table('categorias')->insert(['id' => 4, 'name' => 'BOLSISTA DCR']);
        DB::table('categorias')->insert(['id' => 5, 'name' => 'ALUNO']);
        DB::table('categorias')->insert(['id' => 6, 'name' => 'OUTROS']);

        DB::table('regime_trabalhos')->insert(['id' => 1, 'name' => '20H']);
        DB::table('regime_trabalhos')->insert(['id' => 2, 'name' => '40H']);
        DB::table('regime_trabalhos')->insert(['id' => 3, 'name' => 'DE']);
        DB::table('regime_trabalhos')->insert(['id' => 4, 'name' => 'ALUNO']);
        DB::table('regime_trabalhos')->insert(['id' => 5, 'name' => 'PROFESSOR SUBSTITUTO']);
        DB::table('regime_trabalhos')->insert(['id' => 6, 'name' => 'OUTROS']);

        DB::table('campus')->insert(['id' => 1, 'name' => 'CAMPUS UNIVERSITÁRIO DO ARAGUAIA', 'sigla' => 'CUA']);
        DB::table('campus')->insert(['id' => 2, 'name' => 'CAMPUS UNIVERSITÁRIO DE CUIABÁ', 'sigla' => 'CUC']);
        DB::table('campus')->insert(['id' => 3, 'name' => 'CAMPUS UNIVERSITÁRIO DE RONDONOPOLIS', 'sigla' => 'CUR']);
        DB::table('campus')->insert(['id' => 4, 'name' => 'CAMPUS UNIVERSITÁRIO DE SINPO', 'sigla' => 'CUS']);

        $today = \Carbon\Carbon::now();
        DB::table('institutos')->insert(['id' => 1, 'name' => 'INSTITUTO DE CIÊNCIAS EXATAS E DA TERRA', 'sigla' => 'ICET', 'campus_id' => 1, 'created_at' => $today, 'updated_at' => $today]);
        DB::table('institutos')->insert(['id' => 2, 'name' => 'INSTITUTO DE CIÊNCIAS BIOLÓGICAS E DA SAÚDE', 'sigla' => 'ICBS', 'campus_id' => 1, 'created_at' => $today, 'updated_at' => $today]);
        DB::table('institutos')->insert(['id' => 3, 'name' => 'INSTITUTO DE CIÊNCIAS SOCIAIS E HUMANAS', 'sigla' => 'ICSH', 'campus_id' => 1, 'created_at' => $today, 'updated_at' => $today]);


    }

}