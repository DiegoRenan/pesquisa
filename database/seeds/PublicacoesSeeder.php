<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use \App\News\Publicacao;

class PublicacoesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table('news')->truncate();
        DB::table('editals')->truncate();
        DB::table('documents')->truncate();
        DB::table('eventos')->truncate();*/

        $faker = Faker::create();

        for($i = 0; $i < 290; $i++) {

            $pub = Publicacao::create([
                'title' => $faker->sentence,
                'source' => $faker->word,
                'url' => $faker->url,
                'content' => $faker->paragraph(5),
                'flag_tipo' => 'NW',
                'user_id' => '1'
            ]);

            $aux = rand(0,3);
            switch($aux) {
                case 0:
                    $news = new \App\News\News(['publicated_at' => $faker->dateTime()]);
                    $pub->news()->save($news);
                    $pub->update(['flag_tipo' => 'NW',]);
                    break;

                case 1:
                    $input['started_at'] = $faker->dateTime;
                    $input['finished_at'] = $faker->dateTime;
                    $input['file'] = $faker->sentence;

                    $edital = new \App\News\Edital($input);

                    $pub->edital()->save($edital);
                    $pub->update(['flag_tipo' => 'ED',]);
                    break;

                case 2:
                    $document = new \App\News\Document(['file' => $faker->sentence]);
                    $pub->documento()->save($document);
                    $pub->update(['flag_tipo' => 'DC',]);
                    break;

                case 3:
                    $input= [
                        'start' => $faker->date(),
                        'end' => $faker->date(),
                        'hour' => $faker->time(),
                        'place' => $faker->city(),
                        'alltime' => $faker->boolean()
                    ];

                    $evento = new \App\News\Evento($input);
                    $pub->evento()->save($evento);
                    $pub->update(['flag_tipo' => 'EV',]);
                    break;
            }
            unset($input);
        }
    }
}