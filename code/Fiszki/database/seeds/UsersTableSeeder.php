<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 3)->create();

        User::create([
           'name' => 'test',
           'email' => 'test@example.org',
           'password' => bcrypt( 'test' ),
            'remember_token' => str_random(10),
            'email_verified_at' => now()
        ]);

    }
}
