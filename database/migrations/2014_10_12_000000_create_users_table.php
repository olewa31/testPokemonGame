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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('name')->unique();
            $table->date('birthday');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('pokemons_owned')->default(0);
            $table->integer('army_strength');
            $table->boolean('is_admin')->default(0);
            $table->string('image_path')->default('http://joseph-ministries.com/wp-content/uploads/2015/09/default-avatar.jpg');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
