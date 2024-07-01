<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\user;
use Illuminate\Database\Seeder;

class RelProjectOwnerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user = User::find(1);
    $project = Project::find(1);
    $project->owners()->attach($user->id);

    $project = Project::find(2);
    $project->owners()->attach($user->id);
  }
}
