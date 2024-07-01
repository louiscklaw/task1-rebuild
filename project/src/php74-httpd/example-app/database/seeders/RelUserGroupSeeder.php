<?php

namespace Database\Seeders;

use App\Models\user;
use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class RelUserGroupSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user_group = UserGroup::find(1);
    $user = User::find(1);
    $user->usergroups()->attach(1);
    $user = User::find(2);
    $user->usergroups()->attach(1);

    $user = User::find(3);
    $user->usergroups()->attach(2);

    // $user_group = UserGroup::find(5);
    // $user = User::find(4);
    // $user->usergroups()->attach(6);
    // $user = User::find(5);
    // $user->usergroups()->attach(6);

    // $user = User::find(6);
    // $user->usergroups()->attach(5);

    // $user = User::find(7);
    // $user->usergroups()->attach(6);
    // $user = User::find(8);
    // $user->usergroups()->attach(6);

    // $user = User::find(9);
    // $user->usergroups()->attach(6);
    // $user = User::find(10);
    // $user->usergroups()->attach(6);
    // $user = User::find(11);
    // $user->usergroups()->attach(7);
    // $user = User::find(12);
    // $user->usergroups()->attach(7);
    // $user = User::find(13);
    // $user->usergroups()->attach(5);
    // $user = User::find(14);
    // $user->usergroups()->attach(5);


  }
}
