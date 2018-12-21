<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableHotelsPublications extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('hotel_hotels_publications'))
        {
            Schema::create('hotel_hotels_publications', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->integer('hotel_id')->unsigned();
                $table->integer('publication_id')->unsigned();

                $table->primary(['hotel_id', 'publication_id']);
                $table->foreign('hotel_id', 'fk01_hotel_hotels_publications')
                    ->references('id')
                    ->on('hotel_hotel')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('publication_id', 'fk02_hotel_hotels_publications')
                    ->references('id')
                    ->on('hotel_publication')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('hotel_hotels_publications');
	}
}