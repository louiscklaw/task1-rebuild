<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class RelCategoryItemSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // default category to --
    $item = Item::find(1);
    $category = Category::find(6);
    $item->categories()->attach($category->id);

    $item = Item::find(2);
    $category = Category::find(2);
    $item->categories()->attach($category->id);

    $item = Item::find(3);
    $category = Category::find(3);
    $item->categories()->attach($category->id);

    $item = Item::find(4);
    $category = Category::find(4);
    $item->categories()->attach($category->id);

    $item = Item::find(5);
    $category = Category::find(5);
    $item->categories()->attach($category->id);
  }
}
