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
    Schema::create('tbl_orders', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      $table->string('name')->nullable();
      $table->text('description')->nullable();
      $table->integer('amount')->nullable();

      $table->string('status')->default('pending');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tbl_orders');
  }
};
//
