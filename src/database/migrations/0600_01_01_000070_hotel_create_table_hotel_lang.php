<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelCreateTableHotelLang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('hotel_lang'))
        {
            Schema::create('hotel_lang', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('ix');
                $table->integer('id')->unsigned();
                $table->string('lang_id', 2);

                // cuisine
                $table->string('cuisine')->nullable();
                $table->string('special_dish')->nullable();

                // geolocation descriptions
                $table->text('indications')->nullable();
                $table->text('interest_points')->nullable();

                // features
                $table->string('environment')->nullable();
                $table->string('construction')->nullable();
                $table->text('activities')->nullable();
                $table->string('description_title')->nullable();
                $table->text('description')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('id', 'fk01_hotel_lang')
                    ->references('id')
                    ->on('hotel_hotel')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('lang_id', 'fk02_hotel_lang')
                    ->references('id')
                    ->on('admin_lang')
                    ->onDelete('restrict')
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
        Schema::dropIfExists('hotel_lang');
	}
}