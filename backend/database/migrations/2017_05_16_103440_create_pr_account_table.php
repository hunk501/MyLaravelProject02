<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_pr_account', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string("pr_id", 255);
                        $table->string("firstname", 255);
                        $table->string("middlename", 255);
                        $table->string("lastname", 255);
                        $table->string("prepared_by", 255);
                        $table->string("received_by", 255);
                        $table->string("policy_no", 255);
                        $table->string("payment_in", 255);
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
		Schema::drop('tbl_pr_account');
	}

}
