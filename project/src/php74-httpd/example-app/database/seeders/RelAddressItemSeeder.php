<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Item;
use Illuminate\Database\Seeder;

class RelAddressItemSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $address2 = Address::find(2);
    $address3 = Address::find(3);
    $address4 = Address::find(4);
    $address5 = Address::find(5);
    $address6 = Address::find(6);
    $addresses = [
      $address2,
      $address3,
      $address4,
      $address5,
      $address6,
    ];

    $items = Item::all();
    foreach ($items as $item) {
        $randomAddress = $addresses[array_rand($addresses)];;
        $item->locations()->attach($randomAddress);
    }

  }
}
