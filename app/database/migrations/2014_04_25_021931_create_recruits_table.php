<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
    Schema::create('recruits', function($table)
    {
      $table->increments('id');
      $table->string('recruit_name');
      $table->integer('recruit_count');
      $table->text('recruit_content');
      $table->boolean('freeze')->default(false);
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
    Schema::drop('recruits');
	}

}
