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
            $table->integer('vendor_id');
            $table->string('cus_name');
            $table->string('cus_phone');
            $table->string('address');
            $table->string('payment_status');
            $table->string('order_status');
            $table->string('product_name');
            $table->string('product_price');
            $table->integer('quantity');
            $table->string('refer_code');
            $table->string('order_note');
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
