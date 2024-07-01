<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Helloworld;

class HelloworldSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Helloworld::factory()->create([
      'name' => 'blablabla',
    ]);

    // DB::table('tbl_helloworld')->insert([
    //   'name' => 'admin',
    // ]);
  }
}
