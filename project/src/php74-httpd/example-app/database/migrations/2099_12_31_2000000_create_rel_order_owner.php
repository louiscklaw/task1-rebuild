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
    Schema::create('rel_order_owner', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      $table->unsignedBigInteger('order_id');
      $table
        ->foreign('order_id')
        ->references('id')
        ->on('tbl_orders')
        ->onDelete('cascade');

      $table->unsignedBigInteger('user_id');
      $table
        ->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');

    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('rel_order_order');
  }
};
