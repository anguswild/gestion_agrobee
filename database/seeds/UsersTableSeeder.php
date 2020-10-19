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

      $user_input = [
        'id' => 1,
        'name' => 'Patricio Quezada',
        'email' => 'patricio.quezada05@gmail.com',
        'username' => 'pquezada',
        'password' => bcrypt('12345678'),
      ];

      $user = User::create($user_input);
      $user->assignRole('Admin');

    }
}
