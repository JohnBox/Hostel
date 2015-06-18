<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViolationsTable extends Migration {

	public function up()
	{
		Schema::create('violations', function(Blueprint $table)
		{
			$table->increments('id');
      $table->integer('liver_id');
      $table->string('description');
      $table->float('penalty');
      $table->date('date');
      $table->boolean('paid');
		});
	}

	public function down()
	{
		Schema::drop('violations');
	}

}
