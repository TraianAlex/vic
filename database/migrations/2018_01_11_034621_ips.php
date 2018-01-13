<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Ips.
 *
 * @author  The scaffold-interface created at 2018-01-11 03:46:21pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Ips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('ips',function (Blueprint $table){

        $table->increments('id');

        $table->String('ip');

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
        Schema::drop('ips');
    }
}
