<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('letters', function (Blueprint $table) {
            $table->dropColumn('parentid');
            $table->dropColumn('childid');

            $table->integer('familyid')->unsigned();
        });

        Schema::table('letters', function (Blueprint $table) {
            $table->foreign('familyid')->references('id')->on('families')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('letters', function (Blueprint $table) {
            $table->integer('parentid');
            $table->integer('childid');
            $table->dropForeign('letters_familyid_foreign');
        });
    }
}
