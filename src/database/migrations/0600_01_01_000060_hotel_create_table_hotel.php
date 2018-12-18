<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelCreateTableHotel extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('hotel_hotel'))
        {
            Schema::create('hotel_publication', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->integer('field_group_id')->unsigned()->nullable();

                // description
                $table->string('name');
                $table->string('slug');
                $table->string('web')->nullable();
                $table->string('web_url')->nullable();
                $table->string('contact')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();
                $table->string('fax')->nullable();                              // ?????????? ponemos fax??
                $table->integer('environment_id')->unsigned()->nullable();
                $table->integer('decoration_id')->unsigned()->nullable();
                $table->integer('relationship_id')->unsigned()->nullable();

                // capacity
                $table->string('n_rooms')->nullable();
                $table->string('n_places')->nullable();
                $table->string('n_events_rooms')->nullable();
                $table->string('n_events_rooms_places')->nullable();

                // access
                $table->string('user');
                $table->string('password');
                $table->boolean('active');

                // geolocation data
                $table->string('country_id', 2)->nullable();
                $table->string('territorial_area_1_id', 6)->nullable();
                $table->string('territorial_area_2_id', 10)->nullable();
                $table->string('territorial_area_3_id', 10)->nullable();
                $table->string('zip')->nullable();
                $table->string('locality')->nullable();
                $table->string('address')->nullable();
                $table->decimal('latitude', 17, 14)->nullable();
                $table->decimal('longitude', 17, 14)->nullable();

                $table->json('data_lang')->nullable();
                $table->json('data')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('country_id', 'fk01_hotel_hotel')
                    ->references('id')
                    ->on('admin_country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_1_id', 'fk02_hotel_hotel')
                    ->references('id')
                    ->on('admin_territorial_area_1')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_2_id', 'fk03_hotel_hotel')
                    ->references('id')
                    ->on('admin_territorial_area_2')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_3_id', 'fk04_hotel_hotel')
                    ->references('id')
                    ->on('admin_territorial_area_3')
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
        Schema::dropIfExists('hotel_hotel');
	}
}