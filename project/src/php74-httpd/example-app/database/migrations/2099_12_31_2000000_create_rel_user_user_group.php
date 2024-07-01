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
    Schema::create('rel_user_user_group', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      // default to guest
      $table->unsignedBigInteger('user_group_id');
      $table
        ->foreign('user_group_id')
        ->references('id')
        ->on('tbl_user_groups')
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
    Schema::dropIfExists('rel_user_user_group');
  }
};
