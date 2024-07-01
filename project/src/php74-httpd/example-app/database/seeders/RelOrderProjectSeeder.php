<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Project;
use Illuminate\Database\Seeder;

class RelOrderProjectSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $project = Project::find(1);
    $order = Order::find(2);
    $project->orders()->attach($order->id);

    $project = Project::find(1);
    $order = Order::find(3);
    $project->orders()->attach($order->id);
  }
}
