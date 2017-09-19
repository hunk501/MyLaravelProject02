<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCNCClaimsMonitoring extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tbl_claims_monitoring', function(Blueprint $table){
			$table->string('cnc');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbl_claims_monitoring', function($table) {
			$table->dropColumn('cnc');
		});
	}

}
