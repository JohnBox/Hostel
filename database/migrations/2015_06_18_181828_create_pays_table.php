<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaysTable extends Migration {

	public function up()
	{
		Schema::create('pays', function(Blueprint $table)
		{
			$table->increments('id');
      $table->integer('liver_id');
      $table->date('date');
      $table->float('live_price');
      $table->float('gas_price');
      $table->float('elec_price');
      $table->float('water_price');
      $table->float('total');
      $table->float('paid')->default(0.0);
		});
	}
	public function down()
	{
		Schema::drop('pays');
	}

}
