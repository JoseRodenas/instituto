<?php

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
=======
>>>>>>> f32a759fe1da239edddda4c42e6b0109313aa15a

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        if(env('APP_ENV') != 'production'){
            DB::table('users')->truncate();
            $users = factory(App\User::class,100)->create();
=======
        if(env('APP_ENV') != 'production') {
            DB::table('users')->truncate();
<<<<<<< HEAD
            // Create 100 App\User instances...
            $users = factory(App\User::class, 100)->create();
>>>>>>> f32a759fe1da239edddda4c42e6b0109313aa15a
=======
            DB::table('centros')->truncate();
            // Create 3 App\User instances...
            $users = factory(App\User::class, 3)->create()
                ->each(function ($user) {
                $user->centros()->save(factory(App\Centro::class)->make());
            });

            $users = factory(App\User::class, 97)->create();
>>>>>>> 54b11e709ebf1af848df8786964fa1e6b767ebc1
        }
    }
}
