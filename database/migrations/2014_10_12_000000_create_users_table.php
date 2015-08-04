<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title',50)->unique();
        });
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('firstName',50);
            $table->string('lastName',50);
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('fbid',50)->nullable();
            $table->string('gid',50)->nullable();
            $table->string('avatar')->nullable();
            $table->integer('roleId')->nullable()->unsigned();
            $table->foreign('roleId')->references('id')
                ->on('roles')->onDelete('set null');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('addresses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->string('line1',100);
            $table->string('line2',100)->nullable();
            $table->string('houseNo',10);
            $table->string('city',100);
            $table->string('State',100)->nullable();
            $table->string('country',100);
            $table->string('pinCode',20);
            $table->enum('type', ['billing','shipping']);
            $table->string('phoneNo',20);
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')
                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
        Schema::drop('users');
        Schema::drop('roles');
    }
}
