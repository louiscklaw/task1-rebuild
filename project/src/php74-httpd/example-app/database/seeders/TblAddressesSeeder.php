<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TblAddressesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('tbl_addresses')->insert([
      ['name' => '--', 'description' => 'default empty address'],
      ['name' => 'Sau Mau Ping Office', 'description' => '01 Sau Mau Ping Center, Kwun Tong, Kowloon'],
      ['name' => 'Central Business District Office', 'description' => '10 Main Street, Central, Hong Kong Island'],
      ['name' => 'Tsim Sha Tsui Office', 'description' => '15 Nathan Road, Tsim Sha Tsui, Kowloon'],
      ['name' => 'Wan Chai Office', 'description' => '20 Hennessy Road, Wan Chai, Hong Kong Island'],
      ['name' => 'Mong Kok Office', 'description' => '25 Argyle Street, Mong Kok, Kowloon'],
      // ['name' => 'Causeway Bay Office', 'description' => '30 Yee Wo Street, Causeway Bay, Hong Kong Island'],
      // ['name' => "Sheung Wan Office", "description" => '35 Des Voeux Road Central, Sheung Wan, Hong Kong Island'],
      // ['name' => 'Kwun Tong Office', 'description' => '40 Hoi Yuen Road, Kwun Tong, Kowloon'],
      // ['name' => 'Admiralty Office', 'description' => '45 Queensway Road, Admiralty, Hong Kong Island'],
      // ['name' => 'North Point Office', 'description' => '50 Java Road, North Point, Hong Kong Island'],
      // ['name' => 'Shatin Office', 'description' => '55 Tai Po Road - Shatin Centre Plaza Tower II - Shatin - New Territories'],
      // ['name' => 'Tsuen Wan Office', 'description' => '60 Tsuen Wan Road - Nan Fung Centre - Tsuen Wan - New Territories'],
      // ['name' => 'Yau Ma Tei Office', 'description' => "65 Waterloo Road, Yau Ma Tei, Kowloon"],
      // ['name' => 'Kwai Chung Office', 'description' => "70 Kwai Cheong Road - Kwai Fong - New Territories"],
      // ['name' => 'Aberdeen Office', 'description' => '75 Aberdeen Main Road - Aberdeen Centre - Hong Kong Island'],
      // ['name' => 'Tai Kok Tsui Office', 'description' => '80 Larch Street, Tai Kok Tsui, Kowloon'],
      // ['name' => 'Cheung Sha Wan Office', 'description' => "85 Cheung Sha Wan Road, Cheung Sha Wan, Kowloon"],
      // ['name' => 'Kennedy Town Office', 'description' => "90 Catchick Street, Kennedy Town, Hong Kong Island"],
      // ['name' => 'Tuen Mun Office', 'description' => "95 Tuen Mun Heung Sze Wui Road - Tuen Mun - New Territories"],
      // ['name' => 'Sai Ying Pun Office', 'description' => "100 High Street, Sai Ying Pun, Hong Kong Island"],
    ]);
  }
}
