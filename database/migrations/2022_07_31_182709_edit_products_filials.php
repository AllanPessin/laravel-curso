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
        Schema::create('filials', function (Blueprint $table) {
          $table->id();
          $table->string('filial', 30);
          $table->timestamps();
        });

        Schema::create('product_filials', function (Blueprint $table) {
          $table->id();
          $table->bigInteger('filial_id')->unsigned();
          $table->bigInteger('product_id')->unsigned();
          $table->decimal('price_sale', 8, 2)->default(0.01);
          $table->integer('stock_min')->default(1);
          $table->integer('stock_max')->default(1);
          $table->timestamps();
          $table->foreign('filial_id')->references('id')->on('filials');
          $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('products', function(Blueprint $table) {
          $table->dropColumn(['price', 'stock_min', 'stock_max']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function(Blueprint $table) {
          $table->decimal('price', 8, 2);
          $table->integer('stock_min')->default(1);
          $table->integer('stock_max')->default(1);
        });

        Schema::dropIfExists('product_filials');

        Schema::dropIfExists('filials');
    }
};
