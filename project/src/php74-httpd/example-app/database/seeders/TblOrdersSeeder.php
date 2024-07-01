<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TblOrdersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('tbl_orders')->insert([
      ['name' => '--', 'description' => 'default empty order', 'status' => 'paid', 'amount' => 1],
      ['name' => 'Order 2', 'description' => 'Description for Order 2', 'status' => 'paid', 'amount' => 1],
      ['name' => 'Order 3', 'description' => 'Description for Order 3', 'status' => 'paid', 'amount' => 2],
      ['name' => 'Order 4', 'description' => 'Description for Order 4', 'status' => 'paid', 'amount' => 3],
      // ['name' => 'Order 5', 'description' => 'Description for Order 5', 'status' => 'paid', 'amount' => 4],
      // ['name' => 'Order 6', 'description' => "Description for Order 6", 'status' => 'paid', 'amount' => 5],
      // ['name' => 'Order 7', 'description' => "Description for Order 7", 'status' => 'paid', 'amount' => 6],
      // ['name' => "Order 8", "description" => "Description for Order 8", 'status' => 'paid', 'amount' => 7],
      // ["name" => "Order 9", "description" => "Description for Order 9", 'status' => 'paid', 'amount' => 8],
    ]);
  }
}
