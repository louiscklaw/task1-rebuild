<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TblUserRolesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // UserRole::factory()->create([
    //   'name' => 'product1',
    // ]);

    DB::table('tbl_user_roles')->insert([
      ['name' => 'Administrator', 'description' => 'The Administrator role has full access and control over the system. Administrators can manage users, settings, permissions, and perform all actions within the system.'],
      // ['name' => 'Manager', 'description' => 'The Manager role has managerial responsibilities within the organization. They can oversee teams, make decisions, and have access to specific features and data related to their managerial roles.'],
      // ['name' => 'Employee', 'description' => 'The Employee role represents the general workforce within the organization. Employees have access to necessary tools and resources for their day-to-day tasks.'],
      // ['name' => 'Supervisor', 'description' => 'The Supervisor role oversees a team or department within the organization. Supervisors have additional permissions for monitoring and managing their subordinates.'],
      ['name' => 'User', 'description' => "Sample user role."],
      // ['name' => 'Developer', 'description' => "The Developer role is responsible for software development within the organization. Developers have access to development tools, repositories, and testing environments."],
      // ['name' => 'Sales Representative', 'description' => "The Sales Representative role focuses on driving sales within the organization. They have access to customer relationship management (CRM) tools, sales reports, and lead management systems."],
      // ['name' => 'Support Agent', 'description' => "The Support Agent role provides customer support services. They have access to ticketing systems, knowledge bases, and communication tools for assisting customers."],
      // ['name' => 'Marketing Specialist', 'description' => "The Marketing Specialist role is responsible for marketing and promotional activities. They have access to marketing analytics, campaign management tools, and content creation platforms."],
    ]);

  }
}
