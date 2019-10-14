<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpareDetails extends Migration
{
    
    public function up()
    {
        Schema::create('spare_type_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->string('type_name',50);
            $table->text('type_desc', 500);            
            $table->integer('created_by',11);
            $table->timestamp();
        }); 

        Schema::create('spare_unit_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->string('unit_name',50);
            $table->text('unit_desc', 500);            
            $table->integer('created_by',11);
            $table->timestamp();
        });

        Schema::create('spare_comp_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->string('comp_name',50);
            $table->text('comp_desc', 500);            
            $table->integer('created_by',11);
            $table->timestamp();
        });

        Schema::create('spare_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 10);
            $table->string('name',50);
            $table->integer('type_id',11);
            $table->integer('unit_id',11);
            $table->integer('comp_id',11);
            $table->string('stk_open',50);
            $table->string('stk_curr',50);
            $table->string('stk_buffer',50);
            $table->decimal('rate',10,2);
            $table->integer('gst',50);
            $table->integer('stk_value',50);
            $table->integer('part_no',50);
            $table->decimal('sales_prc',10,2);            
            $table->integer('created_by',11);
            $table->timestamp();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('doc_fitness_det');
        Schema::dropIfExists('doc_greentax_det');
        Schema::dropIfExists('doc_insurance_det');
        Schema::dropIfExists('doc_puc_det');
        Schema::dropIfExists('doc_statepermit');
    }
}
