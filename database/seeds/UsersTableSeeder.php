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
        User::create([
          'name' => 'Omar',
          'email' => 'omar_vazquez_7@hotmail.com',
          'password' => bcrypt('5l1m5hady'),
          'admin' => true
        ]);
    }
}
