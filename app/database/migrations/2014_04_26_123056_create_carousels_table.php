<?php

use Illuminate\Database\Migrations\Migration;

class CreateCarouselsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('carousels', function($table)
        {
            $table->increments('id');
            $table->string('carousel_image');
            $table->text('carousel_content');
            $table->integer('order');
            $table->timestamps();
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::drop('carousels');
	}

}
