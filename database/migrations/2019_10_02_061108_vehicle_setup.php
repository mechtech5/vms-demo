<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleSetup extends Migration
{   
    public function up()
    {
        
        Schema::create('vch_comps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->string('comp_name', 100);
            $table->string('comp_desc', 255)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        
        Schema::create('vch_model', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string ('fleet_code', 100);
            $table->string('vcompany_code');     
            $table->string ('model_name', 100);
            $table->string ('model_desc', 100)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('vch_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string ('fleet_code',100);
            $table->string('vch_no', 15);
            $table->unsignedInteger('vch_comp');
            $table->unsignedInteger('vch_model');
            $table->decimal('reg_km_reading',10,4)->nullable();
            $table->string('personal_vch')->nullable();
            $table->string('owner_name', 100)->nullable();
            $table->string('owner_addr', 250)->nullable();
            $table->string('vch_class', 250)->nullable();
            $table->string('owner_pan',50)->nullable();
            $table->string('reg_make', 100)->nullable();
            $table->decimal('reg_mileage',20,2)->nullable();
            $table->string('reg_no_tyres',20)->nullable();
            $table->string('reg_invoice_no',20)->nullable();
            $table->date('reg_invoice_date')->nullable();
            $table->string('reg_manuf_year',4)->nullable();
            $table->string('reg_seating_capacity',4)->nullable();
            $table->string('reg_unladen_weight',4)->nullable();
            $table->string('reg_type_of_body',4)->nullable();
            $table->date('reg_date')->nullable();
            $table->decimal('reg_tank_cap',10,2)->nullable();
            $table->string('pur_dealer_name',100)->nullable();
            $table->string('pur_dealer_addr',100)->nullable();
            $table->string('pur_dealer_city',100)->nullable();
            $table->string('pur_after_sales_srv',100)->nullable();
            $table->string('pur_invoice_no',100)->nullable();
            $table->date('pur_invoice_dt')->nullable();
            $table->decimal('pur_amt',15,2)->nullable();
            $table->string('pur_free_srv')->nullable();
            $table->string('pur_duplicate_key')->nullable();
            $table->decimal('pur_free_srv_count',15,3)->nullable();
            $table->string('chassis_serial_no',50)->nullable();
            $table->string('chassis_color',20)->nullable();
            $table->string('body_color',20)->nullable();
            $table->decimal('chassis_length',5,2)->nullable();
            $table->decimal('body_height',5,2)->nullable();
            $table->string('accessories_supplied')->nullable();
            $table->date('sale_dt')->nullable();
            $table->decimal('sale_amt',15,2)->nullable();
            $table->string('buyer_name',20)->nullable();
            $table->text('buyer_addr')->nullable();
            $table->string('buyer_city')->nullable();
            $table->string('buyer_phone',20)->nullable();
            $table->decimal('sale_odo_reading',10,2)->nullable();
            $table->text('sale_comments')->nullable();
            $table->string('eng_serial_no',50)->nullable();
            $table->string('eng_power',50)->nullable();
            $table->string('eng_ignition_key_no',50)->nullable();
            $table->string('eng_door_key_no',50)->nullable();
            $table->decimal('eng_cylinder_count')->nullable();
            $table->string('eng_torque',50)->nullable();
            $table->enum('eng_fuel_type',['petrol','diesel','cng','electric'])->nullable();
            $table->string('eng_color',50)->nullable();
            $table->string('vch_pic',50)->nullable();
            $table->string('chassic_pic',50)->nullable();
            $table->string('rc_book_pic',50)->nullable();
            $table->string('owner_pan_pic',50)->nullable();
            $table->string('tds_declaration_pic',50)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
        });

        Schema::create('vch_km_readings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('vch_id');
            $table->decimal('reading',10,2);
            $table->date('date');
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('vch_painting_job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string ('vch_id');
            $table->date('date');     
            $table->decimal ('km_reading');
            $table->string ('cabin_color',10);
            $table->string('body_color',10);
            $table->string('chasis_color',10);
            $table->string('interior_color',10);     
            $table->decimal('cost',10,2);
            $table->text ('remarks',500)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vch_comps');
        Schema::dropIfExists('vch_model');
        Schema::dropIfExists('vch_mast');
        Schema::dropIfExists('vch_km_readings');
        Schema::dropIfExists('vch_painting_job');        
    }
}
   