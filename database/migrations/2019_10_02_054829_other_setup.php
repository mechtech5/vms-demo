<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OtherSetup extends Migration
{
   
    public function up()
    {
        Schema::create('master_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->string('state_name', 100);
            $table->string('state_code', 100);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('master_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('state_id');
            $table->string('fleet_code', 100);
            $table->string('city_name', 100);
            $table->string('city_code', 100);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('agent_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('agent_code');
            $table->string('agent_name', 100);
            $table->string('agent_phone', 100);
            $table->string('agent_address', 255)->nullable();
            $table->string('agent_email', 50);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('insurance_comp_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->string('comp_name', 100);
            $table->string('comp_phone', 100);
            $table->string('comp_addr', 255)->nullable();
            $table->string('comp_email', 50);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_states');
        Schema::dropIfExists('master_cities');
        Schema::dropIfExists('agent_mast');
        Schema::dropIfExists('insurance_comp_mast');
    }
}
