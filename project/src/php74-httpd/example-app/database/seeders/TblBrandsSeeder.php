<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TblBrandsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {

    DB::table('tbl_brands')->insert([
      ['name' => '--', 'description' => 'default empty brand'],
      ['name' => 'Microsoft', 'description' => 'Windows, Office, Surface, Xbox'],
      ['name' => 'Apple', 'description' => 'Mac, iPhone, iPad, iMac'],
      ['name' => 'HP', 'description' => 'Laptops, Printers, Desktops'],
      ['name' => 'Dell', 'description' => 'Laptops, Desktops, Monitors'],
      ['name' => 'Lenovo', 'description' => 'ThinkPad, Yoga, IdeaPad'],
      // ['name' => "Cisco", "description" => 'Networking equipment and solutions'],
      // ['name' => 'Adobe', 'description' => 'Creative Cloud, Photoshop, Illustrator'],
      // ['name' => 'Intel', 'description' => 'Processors and computer components'],
      // ['name' => 'IBM', 'description' => 'Mainframes, servers, software solutions'],
      // ['name' => 'Samsung', 'description' => 'Monitors, SSDs, Smartphones'],
      // ['name' => 'Sony', 'description' => "VAIO laptops and electronics"],
      // ['name' => 'Canon', 'description' => "Printers, cameras"],
      // ['name' => 'Oracle', 'description' => "Database management systems and enterprise software"],
      // ['name' => 'Symantec', 'description' => "Antivirus software and cybersecurity solutions"],
      // ['name' => 'Logitech', 'description' => "Keyboards, mice, webcams"],
      // ['name' => 'Seagate', 'description' => "Hard drives and storage solutions"],
      // ['name' => 'Epson', 'description' => "Printers and projectors"],
      // ['name' => 'VMware', 'description' => "Virtualization software and cloud computing solutions"],
      // ['name' => 'Xerox', 'description' => "Printers and document management solutions"],
      // ['name' => 'Brother Industries', 'description' => "Printers, scanners, sewing machines"],
    ]);
  }
}
