<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdlClaimsMonitoringsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tbl_claims_monitoring', function(Blueprint $table) {
            $table->increments('id');
            $table->string("assured_name", 255);
            $table->string("policy_no", 255);
            $table->string("claims_no", 255)->unique();
            $table->string("claims_officer", 255);
            $table->string("remarks");
            $table->string("police_report");
            $table->string("affidavet_report");
            $table->string("or_cr");
            $table->string("drivers_license");
            $table->string("picture_incident");
            $table->string("repair_estimate");
            $table->string("loa");
            $table->string("premium_guarantee");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tbl_claims_monitoring');
    }

}
