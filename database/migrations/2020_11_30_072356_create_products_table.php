<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_product_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->string('harga')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('weight')->nullable();
            $table->string('kode_produk')->nullable();
            $table->integer('stock_status')->nullable();
            $table->longText('description')->nullable();
            $table->integer('diskon_status')->nullable();
            $table->integer('diskon')->nullable();
            $table->integer('popular_product')->nullable();
            $table->integer('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
