<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('shipping_id');
            $table->integer('status_id');
            $table->string('order_code');
            $table->string('pay_status');
            $table->integer('konfirmasi_pesanan');
            $table->integer('delivery_status');
            $table->integer('current_address');
            $table->integer('payment');
            $table->integer('province');
            $table->integer('city');
            $table->integer('shipping_charge');
            $table->integer('weight');
            $table->integer('total_price');
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
        Schema::dropIfExists('orders');
    }
}
