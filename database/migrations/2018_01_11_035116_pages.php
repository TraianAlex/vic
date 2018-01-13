<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Pages.
 *
 * @author  The scaffold-interface created at 2018-01-11 03:51:16pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Pages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('pages',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('page');
        
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
        Schema::drop('pages');
    }
}
