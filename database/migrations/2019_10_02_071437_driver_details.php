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
            $table->string('image', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->date('joined_dt')->nullable();
            $table->decimal('salary',10,2)->nullable();
            $table->string('license_no',100);
            $table->date('license_exp')->nullable();
            $table->string('phone',14);
            $table->string('blood_group',6)->nullable();
            $table->unsignedTinyInteger('is_active')->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('driver_mast');       
    }
}
