<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('unitys', function (Blueprint $table) {
      $table->id();
      $table->string('unity', 5);
      $table->string('description', 30);
      $table->timestamps();
    });

    Schema::table('product_details', function (Blueprint $table) {
      $table->unsignedBigInteger('unity_id');
      $table->foreign('unity_id')->references('id')->on('unitys');
    });

    Schema::table('products', function (Blueprint $table) {
      $table->unsignedBigInteger('unity_id');
      $table->foreign('unity_id')->references('id')->on('unitys');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('product_details', function (Blueprint $table) {
        $table->dropForeign('product_details_unity_id_foreign');
        $table->dropColumn('unity_id');
    });

    Schema::table('products', function (Blueprint $table) {
        $table->dropForeign('products_unity_id_foreign');
        $table->dropColumn('unity_id');
    });

    Schema::dropIfExists('unitys');
  }
};
