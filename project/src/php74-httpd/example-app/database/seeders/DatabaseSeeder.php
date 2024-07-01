<?php

namespace Database\Seeders;

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
    $this->call(UserSeeder::class);

    $this->call(TblBrandsSeeder::class);
    $this->call(TblCategoriesSeeder::class);
    $this->call(TblProjectsSeeder::class);

    $this->call(TblAddressesSeeder::class);
    $this->call(TblItemsSeeder::class);

    $this->call(TblOrdersSeeder::class);
    $this->call(TblUserRolesSeeder::class);
    $this->call(TblUserGroupsSeeder::class);


    // relations
    $this->call(RelAddressItemSeeder::class);
    $this->call(RelBrandItemSeeder::class);
    $this->call(RelUserItemSeeder::class);
    $this->call(RelCategoryItemSeeder::class);
    $this->call(RelOrderProjectSeeder::class);
    $this->call(RelProjectOwnerSeeder::class);
    $this->call(RelOrderOwnerSeeder::class);
    $this->call(RelUserGroupSeeder::class);
  }
}
