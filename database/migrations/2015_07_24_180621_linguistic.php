<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Linguistic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language',20);
            $table->string('label',20);
            $table->string('symbol',3);
        });
        Schema::create('stringList', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alias')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('productId')->unsigned();
            $table->integer('languageId')->unsigned();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('languageId')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stringList');
        Schema::drop('languages');
    }
}
