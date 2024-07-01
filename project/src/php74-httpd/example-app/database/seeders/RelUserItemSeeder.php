<?php

namespace Database\Seeders;

use App\Models\user;
use App\Models\Item;
use Illuminate\Database\Seeder;

class RelUserItemSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user1 = User::find(1);
    $user2 = User::find(2);
    $user3 = User::find(3);

    $items = Item::all();
    $totalItems = count($items);
    
    foreach ($items as $item) {
      $owners = [$user3, $user1, $user2];
      $randomOwner = $owners[array_rand($owners)];
      $item->owners()->attach($randomOwner->id);
    }
  }
}
