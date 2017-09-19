<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndorsementTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tbl_endorsement', function(Blueprint $table) {
            $table->increments('id');
            $table->string("end_no");
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
        Schema::drop('tbl_endorsement');
    }

}
