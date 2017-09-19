<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdlIRsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_ir', function(Blueprint $table)
		{
			$table->increments('ir_id');
                        $table->string("policy_no", 255);
                        $table->string("nickname", 255);
                        $table->string("assured_name", 255);
                        $table->string("address");
                        $table->string("year_make", 255);
                        $table->string("serial_no", 255);
                        $table->string("engine_no", 255);
                        $table->date("inception_date_from");
                        $table->date("inception_date_to");
                        $table->string("color", 255);
                        $table->string("plate_no", 255);
                        $table->string("financing", 255);
                        $table->string("assured_value", 255);
                        $table->string("agency", 255);
                        $table->string("type", 255);
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
		Schema::drop('tbl_ir');
	}

}
