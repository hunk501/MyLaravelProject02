<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePolicyTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tbl_policy', function (Blueprint $table) {
            $table->increments("id");
            $table->string('policy_no')->unique();
            $table->string('class_insurance');
            $table->date('date_issue');
            $table->string('agency_broker');
            $table->string('insured');
            $table->string('address');
            $table->date('inception_date_from');
            $table->date('inception_date_to');
            $table->string('year_make_model');
            $table->string('plate_number');
            $table->string('serial_chassis');
            $table->string('motor_engine');
            $table->smallInteger('seating_capacity');
            $table->string('color');
            $table->string('value');
            $table->string('deductible');
            $table->string('authorized_repair_limit');
            $table->string('towing');
            $table->string('bodily_injured');
            $table->string('property_damage');
            $table->string('mortgagee');
            $table->string('act_of_nature');
            $table->string('personal_accident');
            $table->string('writing_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tbl_policy');
    }

}
