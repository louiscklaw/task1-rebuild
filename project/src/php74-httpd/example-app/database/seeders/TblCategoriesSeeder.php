<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TblCategoriesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('tbl_categories')->insert([
      ['name' => '--', 'description' => 'default empty category'],
      ['name' => 'Computer', 'description' => 'A device used for processing and storing information.'],
      ['name' => 'Printer', 'description' => 'A machine that produces printed copies of documents or images.'],
      ['name' => 'Desk', 'description' => 'A piece of furniture with a flat surface used for working or writing.'],
      ['name' => 'Chair', 'description' => 'A seat typically used by a person while working at a desk or table.'],
      ['name' => 'File cabinet', 'description' => 'A storage unit designed to hold and organize files and documents.'],
      // ['name' => 'Conference table', 'description' => 'A large table used for meetings and discussions in an office setting.'],
      // ['name' => 'Whiteboard', 'description' => "A smooth, white surface on which non-permanent markers can be used to write or draw."],
      // ['name' => "Office phone", "description" => 'A telephone specifically designed for use in an office environment.'],
      // ['name' => 'Projector', 'description' => 'An optical device that projects an image onto a surface, typically used for presentations or movie screenings.'],
      // ['name' => 'Scanner', 'description' => 'A device that converts physical documents or images into digital format.'],
      // ['name' => 'Filing cabinet', 'description' => 'A piece of furniture with drawers used to store and organize files and paperwork.'],
      // ['name' => 'Shredder', 'description' => 'A machine that cuts paper into small pieces, often used to destroy sensitive documents.'],
      // ['name' => 'Stapler', 'description' => 'A device used to fasten multiple sheets of paper together using staples.'],
      // ['name' => 'Paper shredder', 'description' => "A machine that cuts paper into thin strips or confetti-like pieces, often used to destroy confidential documents."],
      // ['name' => 'Fax machine', 'description' => 'A device that transmits scanned documents or images over a telephone line.'],
      // ['name' => 'Desk lamp', 'description' => 'A light fixture designed to provide illumination for a desk or workspace.'],
      // ['name' => 'Calculator', 'description' => "A device used for mathematical calculations and computations."],
      // ['name' => 'Bulletin board', 'description' => "A surface on which notices, announcements, or messages can be posted."],
      // ['name' => 'Cubicle', 'description' => "A small partitioned area in an office, typically used by one person."],
      // ['name' => 'Safe', 'description' => "A secure storage container used to protect valuable items or sensitive information."],
    ]);
  }
}
