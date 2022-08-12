<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //PLATFORMS
        DB::table('platforms')->insert([
           'id' => 1,
            'name' => 'Netflix',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('platforms')->insert([
            'id' => 2,
            'name' => 'Amazon prime',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('platforms')->insert([
            'id' => 3,
            'name' => 'HBO',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('platforms')->insert([
            'id' => 4,
            'name' => 'Disney+',
            'created_at' => now(),
            'updated_at' => now()
        ]);

         //LANGUAGES
         DB::table('languages')->insert([
            'id' => 1,
            'name' => 'Inglés',
            'ISO_code' => 'EN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('languages')->insert([
            'id' => 2,
            'name' => 'Español',
            'ISO_code' => 'ES',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('languages')->insert([
            'id' => 3,
            'name' => 'Francés',
            'ISO_code' => 'FR',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('languages')->insert([
            'id' => 4,
            'name' => 'Portugués',
            'ISO_code' => 'PR',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //NATIONALITIES
        DB::table('nationalities')->insert([
            'id' => 1,
            'name' => 'Inglesa',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('nationalities')->insert([
            'id' => 2,
            'name' => 'Española',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('nationalities')->insert([
            'id' => 3,
            'name' => 'Francesa',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('nationalities')->insert([
            'id' => 4,
            'name' => 'Portuguesa',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //DIRECTORS
        DB::table('directors')->insert([
            'id' => 1,
            'name' => 'Alejandro',
            'surname' => 'Pina Calafi',
            'date' =>  Carbon::parse('2001-06-20'),
            'nationality' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('directors')->insert([
            'id' => 2,
            'name' => 'David',
            'surname' => 'Benioff',
            'date' => Carbon::parse('2002-06-25'),
            'nationality' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('directors')->insert([
            'id' => 3,
            'name' => 'Laura',
            'surname' => 'Caballero',
            'date' => Carbon::parse('2003-06-10'),
            'nationality' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('directors')->insert([
            'id' => 4,
            'name' => 'Jonathan',
            'surname' => 'Favreau',
            'date' => Carbon::parse('2004-08-20'),
            'nationality' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //ACTORS
        DB::table('actors')->insert([
            'id' => 1,
            'name' => 'Úrsula',
            'surname' => 'Corberó Delgado',
            'date' => Carbon::parse('2001-07-20'),
            'nationality' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 2,
            'name' => 'Pedro',
            'surname' => 'González Alonso',
            'date' => Carbon::parse('2021-06-20'),
            'nationality' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 3,
            'name' => 'Sophie',
            'surname' => 'Turner',
            'date' => Carbon::parse('1981-09-20'),
            'nationality' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 4,
            'name' => 'Christopher',
            'surname' => 'Harington',
            'date' => Carbon::parse('2000-01-01'),
            'nationality' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 5,
            'name' => 'Vanesa',
            'surname' => 'Romero Torres',
            'date' => Carbon::parse('2001-06-20'),
            'nationality' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 6,
            'name' => 'Pablo',
            'surname' => 'Chiapella Cámara',
            'date' => Carbon::parse('2020-06-25'),
            'nationality' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 7,
            'name' => 'Gina',
            'surname' => 'Carano',
            'date' => Carbon::parse('2012-04-18'),
            'nationality' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 8,
            'name' => 'Pedro',
            'surname' => 'Pascal',
            'date' => Carbon::parse('1985-08-29'),
            'nationality' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        //SERIES
        DB::table('series')->insert([
            'id' => 1,
            'title' => 'La casa de papel',
            'platform' => 1,
            'director' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('series')->insert([
            'id' => 2,
            'title' => 'Juego de tronos',
            'platform' => 3,
            'director' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('series')->insert([
            'id' => 3,
            'title' => 'La que se avecina',
            'platform' => 2,
            'director' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('series')->insert([
            'id' => 4,
            'title' => 'The mandalorian',
            'platform' => 4,
            'director' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //SERIE_ACTORS
        DB::table('serie_actors')->insert([
            'id' => 1,
            'serie_id' => 1,
            'actor_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('serie_actors')->insert([
            'id' => 2,
            'serie_id' => 2,
            'actor_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('serie_actors')->insert([
            'id' => 3,
            'serie_id' => 3,
            'actor_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('serie_actors')->insert([
            'id' => 4,
            'serie_id' => 4,
            'actor_id' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //SERIE_LANGUAGES
        DB::table('serie_languages')->insert([
            'id' => 1,
            'serie_id' => 1,
            'language_id' => 2,
            'tipo' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('serie_languages')->insert([
            'id' => 2,
            'serie_id' => 2,
            'language_id' => 4,
            'tipo' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('serie_languages')->insert([
            'id' => 3,
            'serie_id' => 3,
            'language_id' => 3,
            'tipo' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('serie_languages')->insert([
            'id' => 4,
            'serie_id' => 4,
            'language_id' => 1,
            'tipo' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
