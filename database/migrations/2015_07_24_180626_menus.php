<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Menus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
        });
        Schema::create('menuItems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->string('link');
            $table->integer('parentId')->nullable();
            $table->integer('menuId')->unsigned();
            $table->foreign('menuId')->references('id')->on('menu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menuItems');
        Schema::drop('menu');
    }
}
