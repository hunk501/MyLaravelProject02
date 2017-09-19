<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTpl extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tbl_tpl', function(Blueprint $table) {
            $table->increments('id');
            $table->string("tpl_no");
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
        Schema::drop('tbl_tpl');
    }

}
