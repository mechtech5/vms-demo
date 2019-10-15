<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DriverDetails extends Migration
{
   public function up()
    {
        Schema::create('driver_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->string('name', 100);
            $table->string('image', 100);
            $table->string('address', 100);
            $table->integer('city_id');
            $table->integer('state_id');
            $table->date('joined_dt');
            $table->decimal('salary',10,2);
            $table->string('license_no',100);
            $table->date('license_exp');
            $table->string('phone',14);
            $table->string('blood_group ',6);
            $table->tinyInteger('is_active ',6);
            $table->integer('created_by',11);
            $table->timestamp();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('driver_mast');       
    }
}
