<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IpsPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('ip_page',function (Blueprint $table){
			$table->increments('id')->unique()->index()->unsigned();
			$table->integer('ip_id')->unsigned()->index();
			$table->foreign('ip_id')->references('id')->on('ips')->onDelete('cascade');
			$table->integer('page_id')->unsigned()->index();
			$table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
			/**
			 * Type your addition here
			 *
			 */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('ip_page');
    }
}
