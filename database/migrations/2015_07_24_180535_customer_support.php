<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerSupport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emailTemplates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->text('body');
        });
        Schema::create('chat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->text('chat');
            $table->enum('direction',['incoming','outgoing']);
            $table->timestamps();
            $table->foreign('customerId')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('inbox', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->text('body');
            $table->integer('customerId')->unsigned();
            $table->string('emailId');
            $table->enum('direction',['incoming','outgoing']);
            $table->timestamps();
            $table->foreign('customerId')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('phone', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->foreign('customerId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('phone');
        Schema::drop('inbox');
        Schema::drop('chat');
        Schema::drop('emailTemplates');
    }
}
