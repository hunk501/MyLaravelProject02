<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivingCopy extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_receiving_copy', function(Blueprint $table) {
			$table->increments('id');
			$table->string("ledger_id");			
			$table->string("receiving_copy");
			$table->string("receiving_copy_file");			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_receiving_copy');
	}

}
