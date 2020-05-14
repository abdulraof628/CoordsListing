<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return collect([
            ['name' => 'Laravel Admin', 'email' => 'admin@test.com', 'password'=>'admin','type' => 'a'],
            ['name' => 'Laravel User', 'email' => 'user@test.com',  'password'=>'user','type' => 'u'],

        ])
        ->each(function ($user) {

            $registeredUser = App\Models\User::create([
                'name'      => $user['name'],
                'email'     => $user['email'],
                'password'  => bcrypt('password'),
                'type'  	=> $user['type'],
            ]);

        });
    }
}
