<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckVoucherTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tbl_check_voucher', function(Blueprint $table) {
            $table->increments('id');
            $table->string("cv_no");
            $table->string("ledger_id", 255);
            $table->string("uploaded_file");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tbl_check_voucher');
    }

}
