<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableHotelsServices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('hotel_hotels_services'))
        {
            Schema::create('hotel_hotels_services', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->integer('hotel_id')->unsigned();
                $table->integer('service_id')->unsigned();

                $table->primary(['hotel_id', 'service_id']);
            });
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('hotel_hotels_services');
	}
}