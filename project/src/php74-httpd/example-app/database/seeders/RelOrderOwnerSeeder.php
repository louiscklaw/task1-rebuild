<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\user;
use Illuminate\Database\Seeder;

class RelOrderOwnerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user = User::find(1);
    $order = Order::find(1);
    $order->owners()->attach($user->id);

    $order = Order::find(2);
    $order->owners()->attach($user->id);
  }
}
