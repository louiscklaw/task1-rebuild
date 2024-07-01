<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Item;
use Illuminate\Database\Seeder;

class RelBrandItemSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $item = Item::find(1);
    $brand = Brand::find(2);
    $item->brands()->attach($brand->id);
  }
}
