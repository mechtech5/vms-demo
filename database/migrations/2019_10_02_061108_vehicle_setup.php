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
            $table->string('fleet_code', 10);
            $table->string('comp_name', 100);
            $table->string('comp_desc', 255);
            $table->timestamps();
        });

        Schema::create('vch_model', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string ('fleet_code', 10);
            $table->integer('vcompany_code');     
            $table->string ('model_name', 100);
            $table->string ('model_desc', 100);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('vch_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string ('fleet_code', 10);
            $table->string('vch_no', 15);
            $table->unsignedInteger('vch_comp');
            $table->unsignedInteger('vch_model');
            $table->string('owner_name', 100);
            $table->string('owner_addr', 250);
            $table->string('owner_pan',50);
            $table->string('reg_make', 100);
            $table->decimal('reg_mileage',20,2);
            $table->string('reg_no_tyres',20);
            $table->string('reg_chassis_no',20);
            $table->string('reg_engine_no',20);
            $table->string('reg_manuf_year',4);
            $table->date('reg_date');
            $table->decimal('reg_tank_cap',10,2);
            $table->string('pur_dealer_name',100);
            $table->string('pur_dealer_addr',100);
            $table->string('pur_dealer_city',100);
            $table->string('pur_after_sales_srv',100);
            $table->string('pur_invoice_no',100);
            $table->date('pur_invoice_dt');
            $table->decimal('pur_amt',15,2);
            $table->tinyInteger('pur_free_srv');
            $table->tinyInteger('pur_duplicate_key');
            $table->unsignedInteger('pur_free_srv_count');
            $table->string('chassis_serial_no',50);
            $table->string('chassis_color',20);
            $table->string('body_color',20);
            $table->decimal('chassis_length',5,2);
            $table->decimal('body_height',5,2);
            $table->string('accessories_supplied');
            $table->date('sale_dt');
            $table->decimal('sale_amt',15,2);
            $table->string('buyer_name',20);
            $table->text('buyer_addr');
            $table->unsignedInteger('buyer_city');
            $table->string('buyer_phone',20);
            $table->decimal('sale_odo_reading',10,2);
            $table->text('sale_comments');
            $table->string('eng_serial_no',50);
            $table->string('eng_power',50);
            $table->string('eng_ignition_key_no',50);
            $table->string('eng_door_key_no',50);
            $table->unsignedInteger('eng_cylinder_count');
            $table->string('eng_torque',50);
            $table->enum('eng_fuel_type',['petrol','diesel','cng','electric']);
            $table->string('eng_color',50);
            $table->string('vch_pic',50);
            $table->string('chassic_pic',50);
            $table->string('rc_book_pic',50);
            $table->string('owner_pan_pic',50);
            $table->string('tds_declaration_pic',50);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('vch_km_readings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->unsignedInteger('vch_id');
            $table->decimal('reading',10,2);
            $table->date('date');
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('vch_painting_job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger ('vch_id');
            $table->date('date');     
            $table->unsignedInteger ('km_reading');
            $table->string ('cabin_color',10);

            $table->string('body_color',10);
            $table->string('chasis_color',10);
            $table->string('interior_color',10);     
            $table->decimal('cost',10,2);
            $table->text ('remarks',500);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vch_comps');
        Schema::dropIfExists('vch_comps');
        Schema::dropIfExists('vch_mast');
        Schema::dropIfExists('vch_km_readings');
        Schema::dropIfExists('vch_painting_job');        
    }
}
   