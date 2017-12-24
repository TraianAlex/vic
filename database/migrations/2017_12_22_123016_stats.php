<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Stats.
 *
 * @author  The scaffold-interface created at 2017-12-22 12:30:16am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Stats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('stats',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('page');
        
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
        Schema::drop('stats');
    }
}
