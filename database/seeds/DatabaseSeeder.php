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
        DB::table('categorias')->insert([
            'id' => '4',
            'titulo' => 'Alimento',
        ]);

        DB::table('categorias')->insert([
            'id' => '5',
            'titulo' => 'Informática',
        ]);

        DB::table('categorias')->insert([
            'id' => '2',
            'titulo' => 'Eletrodomésticos',
        ]);

        DB::table('categorias')->insert([
            'id' => '3',
            'titulo' => 'Celulares',
        ]);
    }
}
