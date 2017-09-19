<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdlPolicyLedgersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tbl_policy_ledger', function(Blueprint $table) {
            $table->increments('id');
            $table->date('date_issue');
            $table->string('assured_name', 255);
            $table->string('contact_no', 255);
            $table->string('year_model', 255);
            $table->string('insurance_company', 255);
            $table->string('policy_no', 255)->unique();
            $table->date('inception_date_from');
            $table->date('inception_date_to');
            $table->string('value');
            $table->string('financing', 255);
            $table->string('premium');
            $table->string('net_premium');
            $table->string('agent');
            $table->string('pr_no');
            $table->string('commission');
            $table->string('income');            
            $table->string('cv_no');
            $table->string('voucher');
            $table->string('remarks');
            $table->string('delivery_by');
            $table->string('location');
            
            $table->string('class_insurance');
            $table->string('agency_broker');
            $table->string('address');
            $table->string('plate_number');
            $table->string('serial_chassis');
            $table->string('motor_engine');
            $table->smallInteger('seating_capacity');
            $table->string('color');            
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
        Schema::drop('tbl_policy_ledger');
    }

}
