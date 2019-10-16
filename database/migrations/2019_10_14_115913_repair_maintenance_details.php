<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RepairMaintenanceDetails extends Migration
{
    
    public function up()
    {
       Schema::create('srv_filter_replacement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 50);
            $table->unsignedInteger('vch_id');
            $table->date('date');
            $table->decimal('km_reading', 10,2);
            $table->string('filter_type', 50);
            $table->string('filter_comp', 50);
            $table->decimal('cost', 10,2);
            $table->text('remarks', 500)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('srv_oil_cleaning_job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 50);
            $table->unsignedInteger('vch_id');
            $table->date('date');
            $table->decimal('km_reading', 10,2);
            $table->decimal('cost', 10,2);
            $table->text('remarks', 500)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('srv_battery_charging', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('vch_id');
            $table->string('fleet_code', 50);
            $table->date('date');
            $table->string('spec_grav', 100);
            $table->unsignedInteger('volt_reading');
            $table->string('batt_water', 100);
            $table->string('batt_acid', 50);
            $table->string('chr_by', 50);
            $table->string('batt_cond', 50);
            $table->decimal('cost', 10,2);
            $table->decimal('km_reading', 10,2);
            $table->text('remarks', 500)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('srv_painting_job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('vch_id'); 
            $table->date('date'); 
            $table->decimal('km_reading', 10,2);
            $table->string('cabin_color', 100)->nullable();
            $table->string('body_colo', 50)->nullable();
            $table->string('chasis_color', 50)->nullable();
            $table->string('interior_color', 50)->nullable();
            $table->decimal('cost', 10,2);
            $table->text('remarks', 500)->nullable();
            $table->string('fleet_code', 50);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('srv_fuel_tank_cleaning', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 50);
            $table->unsignedInteger('vch_id');
            $table->date('date');
            $table->decimal('km_reading', 10,2);
            $table->decimal('cost', 10,2);
            $table->text('remarks', 500)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

    public function down()
    {
       Schema::dropIfExists('srv_filter_replacement');
       Schema::dropIfExists('srv_oil_cleaning_job');
       Schema::dropIfExists('srv_battery_charging');
       Schema::dropIfExists('srv_painting_job');
       Schema::dropIfExists('srv_fuel_tank_cleaning');
    }
}
