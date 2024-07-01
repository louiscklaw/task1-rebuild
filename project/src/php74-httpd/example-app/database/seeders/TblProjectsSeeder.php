<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TblProjectsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('tbl_projects')->insert([
      ['name' => '--', 'description' => 'default empty project'],
      ['name' => 'E-commerce Website', 'description' => 'A project to develop an online store for selling products and processing customer orders. It includes features such as product catalog, shopping cart, payment integration, and order management.'],
      ['name' => 'Inventory Management System', 'description' => 'A project to create a system for tracking and managing inventory within a company. It includes functionalities such as stock management, order fulfillment, reporting, and supplier management.'],
      ['name' => 'Task Management Application', 'description' => 'A project to build an application for managing tasks and projects within a team or organization. It includes features like task assignment, progress tracking, deadlines, and collaboration tools.'],
      // ['name' => 'Customer Relationship Management (CRM) System', 'description' => 'A project to develop a system for managing customer relationships and interactions. It includes functionalities such as contact management, lead tracking, sales pipeline management, and customer support integration.'],
      // ['name' => 'Social Media Analytics Dashboard', 'description' => "A project to create a dashboard for analyzing social media data. It includes features like real-time monitoring of social media channels, sentiment analysis, engagement metrics, and competitor analysis."],
      // ['name' => 'Travel Booking App', 'description' => "A project to build a mobile application for booking flights, hotels, and other travel services. It includes features like search functionality, booking management, payment integration, and trip planning tools."],
      // ['name' => 'Learning Management System (LMS)', 'description' => "A project to develop an online platform for delivering educational courses and managing learning materials. It includes features like course creation, student enrollment, progress tracking, and assessment tools."],
      // ['name' => 'Event Management Platform', 'description' => "A project to create a platform for managing events such as conferences, seminars, and workshops. It includes functionalities like event registration, ticketing, agenda management, and attendee communication."],
      // ['name' => 'Healthcare Information System', 'description' => "A project to develop a system for storing and managing healthcare-related data. It includes functionalities like patient records management, appointment scheduling, billing, and medical inventory tracking."],
    ]);
  }
}
