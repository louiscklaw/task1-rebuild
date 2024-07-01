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
    Schema::create('rel_category_item', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('item_id');
      $table
        ->foreign('item_id')
        ->references('id')
        ->on('tbl_items')
        ->onDelete('cascade');

      $table->unsignedBigInteger('category_id');
      $table
        ->foreign('category_id')
        ->references('id')
        ->on('tbl_categories')
        ->onDelete('cascade');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('rel_user_item');
  }
};
