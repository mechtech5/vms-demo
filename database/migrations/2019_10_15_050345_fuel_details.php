<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FuelDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_bill_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10)->nullable();
            $table->date('date')->nullable();
            $table->unsignedInteger('fuel_stn_id')->nullable();
            $table->decimal('total_amt_paid', 10,2)->nullable();
            $table->string('payment_mode', 20)->nullable();
            $table->unsignedInteger('pay_no')->nullable();
            $table->date('pay_dt')->nullable();
            $table->string('pay_bank',20)->nullable();
            $table->string('pay_branch', 20);->nullable()
            $table->text('remarks', 500)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

       Schema::create('fuel_filled_entry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100)->nullable();
            $table->unsignedInteger('vch_id');
            $table->date('date')->nullable();
            $table->string('payment_mode', 50)->nullable();
            $table->unsignedInteger('bill_no')->nullable();
            $table->unsignedInteger('fuel_stn_id')->nullable();
            $table->decimal('opening_km',10,2)->nullable();
            $table->decimal('current_km',10,2)->nullable();
            $table->decimal('km_covered', 10,2)->nullable();
            $table->string('current_diesel_filled', 100)->nullable();
            $table->string('fuel_type')->nullable();
            $table->decimal('fuel_rate', 10,2)->nullable();
            $table->decimal('total_fuel_amt', 10,2)->nullable();
            $table->string('fuel_consumed', 100)->nullable();
            $table->string('avg_obtained',100)->nullable();
            $table->string('last_filling_avg',100)->nullable();
            $table->unsignedInteger('driver_id')->nullable();->nullable()
            $table->text('remarks', 500)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('fuel_station_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 50);
            $table->string('pump_name',100)->nullable();
            $table->string('pump_addr',100)->nullable();
            $table->string('pump_phone', 100)->nullable();
            $table->string('pump_website', 100)->nullable();
            $table->string('pump_email', 100)->nullable();
            $table->unsignedInteger('pump_gst_no')->nullable();
            $table->string('pump_city',100)->nullable();
            $table->string('pump_state', 100);
            $table->string('contact_name', 100)->nullable();
            $table->string('contact_phonw',20)->nullable();
            $table->text('note', 500)->nullable();
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
       Schema::dropIfExists('fuel_bill_payments');
       Schema::dropIfExists('fuel_filled_entry');
       Schema::dropIfExists('fuel_station_mast');
    }
}
