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
            $table->string('fleet_code', 100);
            $table->string('type_name',50);
            $table->text('type_desc', 500)->nullable();            
            $table->unsignedInteger('created_by');
            $table->timestamps();
        }); 

        Schema::create('spare_unit_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->string('unit_name',50);
            $table->text('unit_desc', 500)->nullable();            
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('spare_comp_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->string('comp_name',50);
            $table->text('comp_desc', 500)->nullable();            
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('spare_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->string('name',50);
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('unit_id');
            $table->unsignedInteger('comp_id');
            $table->string('stk_open',50)->nullable();
            $table->string('stk_curr',50);
            $table->string('stk_buffer',50)->nullable();
            $table->decimal('rate',10,2)->nullable();
            $table->unsignedInteger('gst')->nullable();
            $table->unsignedInteger('stk_value');
            $table->unsignedInteger('part_no')->nullable();
            $table->decimal('sales_prc',10,2)->nullable();            
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        
         Schema::create('spare_vendor_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->string('name',50);
            $table->string('mobile',15)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email',20)->nullable();
            $table->string('website',50)->nullable();
            $table->text('addr',50)->nullable();
            $table->string('contact_person_name',50)->nullable();
            $table->string('contact_person_phone',15)->nullable();
            $table->unsignedInteger('gst')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('state_id');            
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('spare_mtr_req', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('mtr_no');
            $table->date('mtr_date');
            $table->string('prep_by',10);
            $table->unsignedInteger('po_no');
            $table->text('remarks',500)->nullable();        
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('spare_mtr_req_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('spare_id');
            $table->unsignedInteger('quantity');
            $table->text('remarks',500)->nullable();
            $table->timestamps();
        });

        Schema::create('spare_purchase_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->unsignedInteger('po_number')->nullable();
            $table->date('po_date')->nullable();
            $table->unsignedInteger('vendor_code');
            $table->unsignedInteger('mtr_no')->nullable();
            $table->unsignedInteger('total_qty')->nullable();
            $table->unsignedInteger('grand_total')->nullable();
            $table->decimal('disc_amt',10,2)->nullable();
            $table->decimal('igst_amt',10,2)->nullable();
            $table->decimal('cgst_amt',10,2)->nullable();
            $table->decimal('sgst_amt',10,2)->nullable();
            $table->decimal('net_amt',10,2)->nullable();            
            $table->text('remarks',500)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });

        Schema::create('spare_purchase_order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('po_id');
            $table->unsignedInteger('spare_id');
            $table->unsignedInteger('qty');
            $table->decimal('rate',10,2);
            $table->decimal('amt',10,2);
            $table->decimal('disc_pct',10,2);
            $table->decimal('disc_amt',10,2);
            $table->decimal('igst_pct',10,2);
            $table->decimal('igst_amt',10,2);
            $table->decimal('cgst_pct',10,2);
            $table->decimal('cgst_amt',10,2);
            $table->decimal('sgst_pct',10,2);
            $table->decimal('sgst_amt',10,2);
            $table->decimal('net_amt',10,2);            
            $table->text('remarks',500)->nullable();
            $table->timestamps();
        });

        Schema::create('spare_suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('spare_id');
            $table->unsignedInteger('vendor_id');
            $table->unsignedInteger('spare_comp_id');
            $table->decimal('rate',10,2);            
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('spare_type_mast');
        Schema::dropIfExists('spare_unit_mast');
        Schema::dropIfExists('spare_comp_mast');
        Schema::dropIfExists('spare_mast');
        Schema::dropIfExists('spare_vendor_mast');
        Schema::dropIfExists('spare_mtr_req');
        Schema::dropIfExists('spare_mtr_req_items');
        Schema::dropIfExists('spare_purchase_order');
        Schema::dropIfExists('spare_purchase_order_items');
        Schema::dropIfExists('spare_suppliers');
    }
}
