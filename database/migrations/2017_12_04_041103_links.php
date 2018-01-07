<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Links.
 *
 * @author  The scaffold-interface created at 2017-12-04 04:11:03pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Links extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('links',function (Blueprint $table){

        $table->increments('id');

        $table->String('address');

        $table->String('description')->nullable();

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
        Schema::drop('links');
    }
}
