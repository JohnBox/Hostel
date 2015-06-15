<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('livers', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('last_name');
      $table->string('first_name');
      $table->string('parent_name');
      $table->date('birth');
      $table->integer('sex');
      $table->boolean('student');
      $table->integer('group_id');
      $table->string('country');
      $table->string('canton');
      $table->string('city');
      $table->string('street');
      $table->string('house');
      $table->string('apart');
      $table->string('series');
      $table->string('number');
      $table->string('which');
      $table->string('when');
      $table->string('tel1');
      $table->string('tel2');
      $table->string('tel3');
      $table->integer('room_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('livers');
	}

}
