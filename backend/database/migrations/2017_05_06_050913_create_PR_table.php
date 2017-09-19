<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePRTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_pr', function(Blueprint $table)
		{
			$table->increments('pr_id');
                        $table->smallInteger("pr_account_id");		           
                        $table->decimal("amount", 12, 2);
                        $table->string("check_no", 255);
                        $table->string("bank", 255);
                        $table->string("branch", 255);
                        $table->string("prepared_by", 255);
                        $table->string("received_by", 255);
                        $table->string("payment_in", 255);
                        $table->string("policy_no", 255);
                        $table->string("uploaded_file");
                        $table->smallInteger("bounce");
                        $table->dateTime("cur_date");
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
		Schema::drop('tbl_pr');
	}

}
