<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class MateriamatriculadaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        if (env('APP_ENV') != 'production') {
            DB::table('materiamatriculada')->truncate();
            $materiamatriculada = factory(App\Materiamatriculada::class, 100)->create();
        }
    }
}
