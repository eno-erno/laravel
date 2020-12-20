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
            $table->integer('member_id')->nullable();
            $table->integer('shipping_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('order_code')->nullable();
            $table->string('pay_status')->nullable();
            $table->integer('konfirmasi_pesanan')->nullable();
            $table->integer('delivery_status')->nullable();
            $table->integer('current_address')->nullable();
            $table->integer('payment')->nullable();
            $table->integer('province')->nullable();
            $table->integer('city')->nullable();
            $table->integer('shipping_charge')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('total_price')->nullable();
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
