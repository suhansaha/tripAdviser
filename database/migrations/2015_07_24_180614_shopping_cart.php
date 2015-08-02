<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShoppingCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->integer('shippingAddressId')->unsigned()->nullable();
            $table->integer('billingAddressId')->unsigned();
            $table->string('status');
            $table->timestamps();
            $table->foreign('customerId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shippingAddressId')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('billingAddressId')->references('id')->on('addresses')->onDelete('cascade');
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productId')->unsigned();
            $table->integer('cartId')->unsigned();
            $table->integer('adults')->unsigned();
            $table->integer('children')->unsigned();
            $table->timestamps();
            $table->float('price')->default(0);
            $table->foreign('cartId')->references('id')->on('cart')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
        });
        Schema::create('orderDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderId')->unsigned();
            $table->string('fullName')->nullable();
            $table->string('email')->nullable();
            $table->integer('age')->unsigned();
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
        });

        Schema::create('productOrder', function (Blueprint $table) {
            $table->integer('productId')->unsigned()->index();
            $table->integer('orderId')->unsigned()->index();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productOrder');
        Schema::drop('orderDetails');
        Schema::drop('orders');
        Schema::drop('cart');
    }
}
