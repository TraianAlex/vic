<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Admins.
 *
 * @author  The scaffold-interface created at 2017-12-03 11:42:34pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Admins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('admins',function (Blueprint $table){

        $table->increments('id');

        $table->String('name');

        $table->string('email')->unique();
        $table->string('password', 60);
        $table->rememberToken();
        /**
         * Foreignkeys section
         */


        $table->timestamps();


        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('admins');
    }
}
