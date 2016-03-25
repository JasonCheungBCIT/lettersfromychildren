<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function(Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthdate');
            $table->boolean('male');
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('parents', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('spouseid');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthdate');
            $table->boolean('male');
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('letters', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('parentid');
            $table->integer('childid');
            $table->date('letterwrittendate');
            $table->text('letter');
            $table->binary('picture');
            $table->text('picturecaption');
            $table->text('picturefilename');
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
        Schema::drop('children');
        Schema::drop('parents');
        Schema::drop('letters');
    }
}
