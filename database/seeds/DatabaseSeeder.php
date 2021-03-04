<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        App\User::create([
            'name' => 'Julian Calle V', 
            'email' => 'juliancalle2003@gmail.com',
            'password' => bcrypt('123456')
        ]);

    }
}
