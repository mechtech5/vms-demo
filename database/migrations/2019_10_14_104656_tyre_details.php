->nullable()<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TyreDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyre_comp_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 50);
            $table->string('comp_name', 50);
            $table->string('comp_desc', 100)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('tyre_model_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('comp_id');
            $table->string('model_name', 50);
            $table->string('model_desc', 100)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('tyre_type_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 50);
            $table->string('type_name', 50);
            $table->string('type_desc', 100)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('tyre_vendor_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 50);
            $table->string('name', 25);
            $table->string('mobile', 100);
            $table->string('phone', 50);
            $table->string('email', 50)->nullable();
            $table->string('website', 100)->nullable();
            $table->text('addr', 500)->nullable();
            $table->string('contact_person_name', 100);
            $table->string('contact_person_phone', 10)->nullable();
            $table->unsignedInteger('gst')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('state_id');
            $table->enum('vendor_type', ['remolding company','repairing vendor',
                'tyre supplier', 'hard'])->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

    public function down()
    {
       Schema::dropIfExists('tyre_comp_mast');
       Schema::dropIfExists('tyre_model_mast');
       Schema::dropIfExists('tyre_type_mast');
       Schema::dropIfExists('tyre_vendor_mast');
    }
}
