<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_fitness_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id');
            $table->string('fitness_no',100);
            $table->decimal('fitness_amt',10,2);
            $table->string('payment_mode',50);
            $table->unsignedInteger('pay_no');
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');
            $table->date('update_dt');
            $table->string('doc_file',100);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });        

        Schema::create('doc_greentax_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id');
            $table->string('greentax_no',100);
            $table->decimal('greentax_amt',10,2);
            $table->string('payment_mode',50);
            $table->unsignedInteger('pay_no');
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');
            $table->date('update_dt');
            $table->string('doc_file',100);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });        

        Schema::create('doc_insurance_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id');
            $table->string('ins_comp',100);
            $table->string('ins_policy_no',50);
            $table->string('payment_mode',50);
            $table->unsignedInteger('pay_no');
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');
            $table->decimal('ins_amt',10,2);
            $table->decimal('ins_pre_amt',10,2);
            $table->decimal('ins_type',10,2);
            $table->date('update_dt');
            $table->string('doc_file',100);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });        

        Schema::create('doc_puc_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id');
            $table->unsignedInteger('puc_no');
            $table->decimal('puc_amt',10,2);
            $table->string('payment_mode',50);
            $table->unsignedInteger('pay_no');
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');             
            $table->date('update_dt');
            $table->string('doc_file',100);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('doc_statepermit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id');
            $table->unsignedTinyInteger('all_india_permit');
            $table->unsignedInteger('state_id');
            $table->string('payment_mode',50);
            $table->unsignedInteger('pay_no');
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');             
            $table->date('update_dt');
            $table->string('doc_file',100);
            $table->decimal('permit_amt',10,2);
            $table->unsignedInteger('draft_no');
            $table->date('draft_date');
            $table->unsignedInteger('permit_no');
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('doc_roadtax_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id');
            $table->unsignedInteger('roadtax_no');
            $table->decimal('roadtax_amt',10,2);
            $table->string('payment_mode',50);
            $table->unsignedInteger('pay_no');
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');             
            $table->date('update_dt');
            $table->string('doc_file',100);
            $table->string('fleet_code',10);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('doc_temporary_permit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',10);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id');
            $table->string('curr_loc',20);
            $table->string('trans_loc',20);
            $table->unsignedTinyInteger('forms_cmpl');
            $table->date('forms_start_dt');
            $table->date('forms_end_dt');
            $table->string('forms_total_days',20);
            $table->unsignedInteger('tp_permit_no');
            $table->date('tp_permit_start_dt');             
            $table->date('tp_permit_end_dt');
            $table->string('tp_total_days',20);
            $table->unsignedInteger('tp_state_id');
            $table->unsignedInteger('tp_roadtax_no');
            $table->decimal('tp_tax_amt',10,2);
            $table->date('tp_roadtax_start_dt');             
            $table->date('tp_roadtax_end_dt');
            $table->text('remarks',500);
            $table->unsignedInteger('created_by');
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
        Schema::dropIfExists('doc_fitness_det');
        Schema::dropIfExists('doc_greentax_det');
        Schema::dropIfExists('doc_insurance_det');
        Schema::dropIfExists('doc_puc_det');
        Schema::dropIfExists('doc_statepermit');
        Schema::dropIfExists('doc_roadtax_det');
        Schema::dropIfExists('doc_temporary_permit');
    }
}
