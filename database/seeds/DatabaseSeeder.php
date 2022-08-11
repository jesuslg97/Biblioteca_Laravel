<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'update_at' => now()
        ]);

        DB::table('platforms')->insert([
            'id' => 2,
            'name' => 'Amazon prime',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('platforms')->insert([
            'id' => 3,
            'name' => 'HBO',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('platforms')->insert([
            'id' => 4,
            'name' => 'Disney+',
            'created_at' => now(),
            'update_at' => now()
        ]);

        //DIRECTORS
        DB::table('directors')->insert([
            'id' => 1,
            'name' => 'Alejandro',
            'surname' => 'Pina Calafi',
            'date' => date(1967-6-23),
            'nationality' => '2',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('directors')->insert([
            'id' => 2,
            'name' => 'David',
            'surname' => 'Benioff',
            'date' => date(1970-9-25),
            'nationality' => '1',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('directors')->insert([
            'id' => 3,
            'name' => 'Laura',
            'surname' => 'Caballero',
            'date' => date(1978-2-18),
            'nationality' => '2',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('directors')->insert([
            'id' => 4,
            'name' => 'Jonathan',
            'surname' => 'Favreau',
            'date' => date(1966-10-19),
            'nationality' => '1',
            'created_at' => now(),
            'update_at' => now()
        ]);

        //ACTORS
        DB::table('actors')->insert([
            'id' => 1,
            'name' => 'Úrsula',
            'surname' => 'Corberó Delgado',
            'date' => date(1989-8-11),
            'nationality' => '2',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 2,
            'name' => 'Pedro',
            'surname' => 'González Alonso',
            'date' => date(1971-6-21),
            'nationality' => '2',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 3,
            'name' => 'Sophie',
            'surname' => 'Turner',
            'date' => date(1996-2-21),
            'nationality' => '1',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 4,
            'name' => 'Christopher',
            'surname' => 'Harington',
            'date' => date(1986-12-26),
            'nationality' => '1',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 5,
            'name' => 'Vanesa',
            'surname' => 'Romero Torres',
            'date' => date(1978-6-04),
            'nationality' => '2',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 6,
            'name' => 'Pablo',
            'surname' => 'Chiapella Cámara',
            'date' => date(1976-12-1),
            'nationality' => '2',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 7,
            'name' => 'Gina',
            'surname' => 'Carano',
            'date' => date(1982-04-16),
            'nationality' => '1',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('actors')->insert([
            'id' => 8,
            'name' => 'Pedro',
            'surname' => 'Pascal',
            'date' => date(1975-04-02),
            'nationality' => '2',
            'created_at' => now(),
            'update_at' => now()
        ]);

        //LANGUAGES
        DB::table('languages')->insert([
            'id' => 1,
            'name' => 'Inglés',
            'ISO_code' => 'EN',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('languages')->insert([
            'id' => 2,
            'name' => 'Español',
            'ISO_code' => 'ES',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('languages')->insert([
            'id' => 3,
            'name' => 'Francés',
            'ISO_code' => 'FR',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('languages')->insert([
            'id' => 4,
            'name' => 'Portugués',
            'ISO_code' => 'PR',
            'created_at' => now(),
            'update_at' => now()
        ]);

        //NATIONALITIES
        DB::table('nationalities')->insert([
            'id' => 1,
            'name' => 'Inglesa',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('nationalities')->insert([
            'id' => 2,
            'name' => 'Española',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('nationalities')->insert([
            'id' => 3,
            'name' => 'Francesa',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('nationalities')->insert([
            'id' => 4,
            'name' => 'Portuguesa',
            'created_at' => now(),
            'update_at' => now()
        ]);

        //SERIES
        DB::table('series')->insert([
            'id' => 1,
            'title' => 'La casa de papel',
            'platform' => 1,
            'director' => 1,
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('series')->insert([
            'id' => 2,
            'title' => 'Juego de tronos',
            'platform' => 3,
            'director' => 2,
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('series')->insert([
            'id' => 3,
            'title' => 'La que se avecina',
            'platform' => 2,
            'director' => 3,
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('series')->insert([
            'id' => 3,
            'title' => 'The mandalorian',
            'platform' => 4,
            'director' => 4,
            'created_at' => now(),
            'update_at' => now()
        ]);

        //SERIE_ACTORS
        DB::table('serie_actors')->insert([
            'id' => 1,
            'serie_id' => 1,
            'actor_id' => 1,
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('serie_actors')->insert([
            'id' => 2,
            'serie_id' => 2,
            'actor_id' => 3,
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('serie_actors')->insert([
            'id' => 3,
            'serie_id' => 3,
            'actor_id' => 5,
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('serie_actors')->insert([
            'id' => 4,
            'serie_id' => 4,
            'actor_id' => 7,
            'created_at' => now(),
            'update_at' => now()
        ]);

        //SERIE_LANGUAGES
        DB::table('serie_languages')->insert([
            'id' => 1,
            'serie_id' => 1,
            'actor_id' => 2,
            'tipo' => 'audio',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('serie_languages')->insert([
            'id' => 2,
            'serie_id' => 2,
            'actor_id' => 4,
            'tipo' => 'subtitle',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('serie_languages')->insert([
            'id' => 3,
            'serie_id' => 3,
            'actor_id' => 3,
            'tipo' => 'subtitle',
            'created_at' => now(),
            'update_at' => now()
        ]);

        DB::table('serie_languages')->insert([
            'id' => 4,
            'serie_id' => 4,
            'actor_id' => 1,
            'tipo' => 'audio',
            'created_at' => now(),
            'update_at' => now()
        ]);

    }
}
