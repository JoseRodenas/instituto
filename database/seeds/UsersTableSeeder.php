<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(env('APP_ENV') != 'production'){
            DB::table('users')->truncate();
            $users = factory(App\User::class,100)->create();

        if(env('APP_ENV') != 'production') {
            DB::table('users')->truncate();

            DB::table('centros')->truncate();
            // Create 3 App\User instances...
            $users = factory(App\User::class, 3)->create()
                ->each(function ($user) {
                $user->centros()->save(factory(App\Centro::class)->make());
            });

            //Profesores
            $users = factory(App\User::class, 97)->create();

            // Alumnos
            $users = factory(App\User::class, 200)->create()
                ->each(function ($user) {
                $user->matriculas()->save(factory(App\Matricula::class)->make());
            });
        }
    }
}
