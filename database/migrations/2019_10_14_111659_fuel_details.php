<?php11

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FuelDetails extends Migration
{
    
    public function up()
    {
       Schema::create('fuel_bill_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->date('date');
            $table->integer('fuel_stn_id', 11);
            $table->decimal('total_amt_paid', 10,2);
            $table->string('payment_mode', 20);
            $table->integer('pay_no', 11);
            $table->date('pay_dt');
            $table->string('pay_bank',20);
            $table->string('pay_branch', 20);
            $table->text('remarks', 500);
            $table->integer('created_by', 11);
            $table->timestamp();
        });

       Schema::create('fuel_filled_entry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->integer('vch_id',11);
            $table->date('date');
            $table->string('payment_mode', 50);
            $table->integer('bill_no', 11);
            $table->integer('fuel_stn_id', 11);
            $table->decimal('opening_km',10,2);
            $table->decimal('current_km',10,2);
            $table->decimal('km_covered', 10,2);
            $table->string('current_diesel_filled', 100);
            $table->string('fuel_type');
            $table->decimal('fuel_rate', 10,2);
            $table->decimal('total_fuel_amt', 10,2);
            $table->string('fuel_consumed', 100);
            $table->string('avg_obtained',100);
            $table->string('last_filling_avg',100);
            $table->integer('driver_id', 11);
            $table->text('remarks', 500);
            $table->integer('created_by', 11);
            $table->timestamp();
        });

        Schema::create('fuel_station_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 50);
            $table->string('pump_name',100);
            $table->string('pump_addr',100);
            $table->string('pump_phone', 100);
            $table->string('pump_website', 100);
            $table->string('pump_email', 100);
            $table->integer('pump_gst_no',11);
            $table->string('pump_city',100);
            $table->string('pump_state ', 100);
            $table->string('contact_name', 100);
            $table->string('contact_phonw',20);
            $table->text('note', 500);
            $table->integer('created_by', 11);
            $table->timestamp();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('fuel_bill_payments');
        Schema::dropIfExists('fuel_filled_entry');
        Schema::dropIfExists('fuel_station_mast');
    }
}
