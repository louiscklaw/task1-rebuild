<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert(
      [
        'username' => 'admin',
        'firstname' => 'Admin',
        'lastname' => 'Admin',
        'roles' => 1,
        'email' => 'admin@ims.com',
        'password' => bcrypt('secret')
      ]
    );

    DB::table('users')->insert(
      [
        'username' => 'johntam',
        'firstname' => 'John',
        'lastname' => 'Tam',
        'roles' => 2,
        'email' => 'johntam@ims.com',
        'password' => bcrypt('secret')
      ]
    );

    DB::table('users')->insert(
      [
        'username' => 'marysmith',
        'firstname' => 'Mary',
        'lastname' => 'Smith',
        'email' => 'marysmith@ims.com',
        'roles' => 2,
        'password' => bcrypt('secret')
      ]
    );

  }
}
