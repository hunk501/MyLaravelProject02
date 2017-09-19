<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdlLedgersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            /*
            Schema::create('mdl_ledgers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
		});
                */
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('mdl_ledgers');
	}

}
