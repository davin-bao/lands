<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('settings', function($table)
        {
            $table->increments('id');
            $table->string('site_url');
            $table->string('company_name');
            $table->string('master_email');
            $table->string('address');
            $table->string('service_phone');
            $table->string('mobile');
            $table->text('company_instroductions');
            $table->text('services');
            $table->text('contact');
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
        Schema::drop('settings');
	}

}
