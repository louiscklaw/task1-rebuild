<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TblUserGroupsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('tbl_user_groups')->insert([
      ['name' => 'Admins', 'description' => 'The Admins group consists of users with administrative privileges. They have full access to the system, including management of users, settings, and permissions.'],
      ['name' => 'User', 'description' => "Sample user"],
      // ['name' => 'Sales', 'description' => 'The Sales department is responsible for generating revenue by selling products or services to customers.'],
      // ['name' => 'Marketing', 'description' => 'The Marketing department focuses on promoting the companys products or services to attract and retain customers.'],
      // ['name' => 'Finance', 'description' => 'The Finance department manages the companys financial activities, including budgeting, accounting, and financial reporting.'],
      // ['name' => 'IT', 'description' => "The IT department is in charge of managing the companys technology infrastructure, including hardware, software, and network systems."],
      // ['name' => 'Customer Service', 'description' => "The Customer Service department handles customer inquiries, issues, and complaints to ensure a positive customer experience."],
      // ['name' => 'Operations', 'description' => "The Operations department oversees the day-to-day operations of the company to ensure efficiency and productivity."],
      // ['name' => 'Research and Development', 'description' => "The Research and Development department focuses on innovating new products or improving existing ones through research and experimentation."],
      // ['name' => 'Quality Assurance', 'description' => "The Quality Assurance department is responsible for ensuring that products meet quality standards before they are released to customers."],
      // ['name' => 'Legal', 'description' => "The Legal department provides legal advice and support to the company on various matters such as contracts, compliance, and disputes."],
      // ['name' => "Production", 'description' => " The Production Department is responsible for manufacturing goods or creating services that the company offers."],
      // ['name' => "Supply Chain", 'description' => " The Supply Chain Department manages the flow of goods and services from suppliers to customers."],
      // ['name' => "Public Relations", 'description' => " The Public Relations Department handles communication between the company and the public to maintain a positive image."],
      // ['name' => "Training", 'description' => " The Training Department develops programs to educate employees on skills necessary for their roles."],
      // ['name' => "Facilities", 'description' => " The Facilities Department manages physical spaces where employees work ensuring they are safe and functional."],
      // ['name' => "Procurement", 'description' => " The Procurement Department is responsible for sourcing goods and services needed by the company."],
      // ['name' => "Compliance", 'description' => " The Compliance Department ensures that the company follows all relevant laws regulations."],
      // ['name' => "Engineering", 'description' => " The Engineering Department designs develops implements technical solutions."],
      // ['name' => "Security", 'description' => " The Security Department protects company assets from threats such as cyber attacks theft."],
    ]);

  }
}
