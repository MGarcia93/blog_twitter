<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::create([
           'name' => 'maximiliano',
           'email' => 'maximiliano_garcia93@hotmail.com',
           'password' => bcrypt('12345678')
       ]);

       User::factory()
                ->count(10)
                ->create();
    }
}
