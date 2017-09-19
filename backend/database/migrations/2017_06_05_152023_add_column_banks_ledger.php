<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBanksLedger extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tbl_policy_ledger', function(Blueprint $table){
            $table->string('banks_file');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tbl_policy_ledger', function($table) {
            $table->dropColumn('banks_file');
        });
    }

}
