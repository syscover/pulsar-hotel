<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableHotelsProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('hotel_hotels_products'))
        {
            Schema::create('hotel_hotels_products', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->integer('hotel_id')->unsigned();
                $table->integer('product_id')->unsigned();
                $table->string('lang_id', 2);
                $table->text('description')->nullable();

                $table->primary(['hotel_id', 'product_id', 'lang_id']);
                $table->foreign('hotel_id', 'fk01_hotel_hotels_products')
                    ->references('id')
                    ->on('hotel_hotel')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('product_id', 'fk02_hotel_hotels_products')
                    ->references('id')
                    ->on('market_product')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('lang_id', 'fk03_hotel_hotels_products')
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
        Schema::dropIfExists('hotel_hotels_products');
	}
}