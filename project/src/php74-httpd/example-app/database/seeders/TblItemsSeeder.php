<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Item;

class TblItemsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $addresses = Address::all();
    $users = User::all();

    foreach (range(1, 2) as $i) {
      Item::factory()->create([
        'name' => 'computer set ' . $i,
        'description' => 'office computer ' . $i,
        'location' => $addresses[$i]->id,
        'amount'=> 1,
        'owner' => $users[random_int(0, 2)]->id
      ]);
    }

    foreach (range(1, 2) as $i) {
      Item::factory()->create([
        'name' => 'printer set ' . $i,
        'description' => 'office printer ' . $i,
        'location' => $addresses[$i]->id,
        'amount'=> 1,
        'owner' => $users[random_int(0, 2)]->id
      ]);
    }

    foreach (range(1, 2) as $i) {
      Item::factory()->create([
        'name' => 'switching hub ' . $i,
        'description' => 'office network switch ' . $i,
        'location' => $addresses[$i]->id,
        'amount'=> 1,
        'owner' => $users[random_int(0, 2)]->id
      ]);
    }

    $faker = Faker::create();
    foreach (range(1, 2) as $i) {
      Item::factory()->create([
        'name' => 'item test ' . $i,
        'description' => 'Description for Item ' . $i,
        'location' => $addresses[$i]->id,
        'amount'=> 1,
        'owner' => $users[random_int(0, 2)]->id
      ]);
    }

  }
}
