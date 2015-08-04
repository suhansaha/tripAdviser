<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country');
            $table->integer('imageId')->unsigned()->nullable();
          //  $table->foreign('imageId')->references('id')->on('images');
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('imageId')->unsigned()->nullable();
          //  $table->foreign('imageId')->references('id')->on('images');
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag');
        });
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->char('symbol',3)->nullable();
            $table->float('rate')->default('1');
        });
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('url');
        });
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
        });
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('SKU')->unique();
            $table->float('price')->default(0);
            $table->integer('currencyId')->unsigned()->nullable();
            $table->date('publishDate')->nullable();
            $table->integer('coverImageId')->unsigned()->nullable();
            $table->string('videoUrl')->nullable();
            $table->integer('cityId')->unsigned();
            $table->integer('vendorId')->unsigned();
            $table->boolean('active')->default(TRUE);
            $table->foreign('currencyId')->references('id')->on('currencies')->onDelete('cascade');
            //$table->foreign('coverImageId')->references('id')->on('images');
            $table->foreign('cityId')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('vendorId')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('availability', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productId')->unsigned();
            $table->date('date');
            $table->integer('quantity')->default(0);
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
        });
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->integer('productId')->unsigned();
            $table->string('title');
            $table->string('comment');
            $table->integer('rating');
            $table->date('date');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('customerId')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('productTag', function (Blueprint $table) {
            $table->integer('productId')->unsigned()->index();
            $table->integer('tagId')->unsigned()->index();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('tagId')->references('id')->on('tags')->onDelete('cascade');
        });
        Schema::create('productCategory', function (Blueprint $table) {
            $table->integer('productId')->unsigned()->index();
            $table->integer('categoryId')->unsigned()->index();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
        });
        Schema::create('productImages', function (Blueprint $table) {
            $table->integer('productId')->unsigned()->index();
            $table->integer('imageId')->unsigned()->index();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('imageId')->references('id')->on('images')->onDelete('cascade');
        });
        Schema::create('galleryImages', function (Blueprint $table) {
            $table->integer('galleryId')->unsigned()->index();
            $table->integer('imageId')->unsigned()->index();
            $table->foreign('galleryId')->references('id')->on('galleries')->onDelete('cascade');
            $table->foreign('imageId')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('galleryImages');
        Schema::drop('productImages');
        Schema::drop('productCategory');
        Schema::drop('productTag');
        Schema::drop('reviews');
        Schema::drop('availability');
        Schema::drop('products');
        Schema::drop('galleries');
        Schema::drop('images');
        Schema::drop('currencies');
        Schema::drop('tags');
        Schema::drop('categories');
        Schema::drop('cities');
    }
}
