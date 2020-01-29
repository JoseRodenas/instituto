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

        if (env('APP_ENV') != 'production') {
            DB::table('users')->truncate();
            $users = factory(App\User::class, 100)->create();

            if (env('APP_ENV') != 'production') {
                DB::table('users')->truncate();
                // Create SuperAdmin account
                $superAdmin = \App\User::create([
                    'email' => config('app.superadmin_email'),
                    'email_verified_at' => now(),
                    'password' => bcrypt(config('app.superadmin_password')),
                    'name' => explode('@', config('app.superadmin_email'))[0],
                    'first_name' => config('app.superadmin_first_name'),
                    'last_name' => config('app.superadmin_last_name'),
                ]);
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
}
