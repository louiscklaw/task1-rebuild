<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('rel_order_project', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('project_id');
      $table
        ->foreign('project_id')
        ->references('id')
        ->on('tbl_projects')
        ->onDelete('cascade');

      $table->unsignedBigInteger('order_id');
      $table
        ->foreign('order_id')
        ->references('id')
        ->on('tbl_orders')
        ->onDelete('cascade');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('rel_order_project');
  }
};
