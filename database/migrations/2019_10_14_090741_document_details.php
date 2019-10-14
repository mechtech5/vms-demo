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
            $table->integer('vch_id',11);
            $table->integer('agent_id', 11);
            $table->string('fitness_no',100);
            $table->decimal('fitness_amt',10,2);
            $table->string('payment_mode',50);
            $table->integer('pay_no',11);
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');
            $table->date('update_dt');
            $table->string('doc_file',100);
            $table->integer('created_by',11);
            $table->timestamp();
        });        

        Schema::create('doc_greentax_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->integer('vch_id',11);
            $table->integer('agent_id', 11);
            $table->string('greentax_no',100);
            $table->decimal('greentax_amt',10,2);
            $table->string('payment_mode',50);
            $table->integer('pay_no',11);
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');
            $table->date('update_dt');
            $table->string('doc_file',100);
            $table->integer('created_by',11);
            $table->timestamp();
        });        

        Schema::create('doc_insurance_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->integer('vch_id',11);
            $table->integer('agent_id', 11);
            $table->string('ins_comp',100);
            $table->string('ins_policy_no',50);
            $table->string('payment_mode',50);
            $table->integer('pay_no',11);
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
            $table->integer('created_by',11);
            $table->timestamp();
        });        

        Schema::create('doc_puc_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->integer('vch_id',11);
            $table->integer('agent_id', 11);
            $table->integer('puc_no',10);
            $table->decimal('puc_amt',10,2);
            $table->string('payment_mode',50);
            $table->integer('pay_no',11);
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');             
            $table->date('update_dt');
            $table->string('doc_file',100);
            $table->integer('created_by',11);
            $table->timestamp();
        });

        Schema::create('doc_statepermit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->integer('vch_id',11);
            $table->integer('agent_id', 11);
            $table->tinyIncrements('all_india_permit');
            $table->integer('state_id '11);
            $table->string('payment_mode',50);
            $table->integer('pay_no',11);
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');             
            $table->date('update_dt');
            $table->string('doc_file',100);
            $table->decimal('permit_amt',10,2);
            $table->integer('draft_no',20);
            $table->date('draft_date');
            $table->integer('permit_no',22);
            $table->integer('created_by',11);
            $table->timestamp();
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
    }
}
