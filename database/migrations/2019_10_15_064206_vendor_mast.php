<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorMast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('vendor_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',20);
            $table->string('name',20);
            $table->string('email',20);
            $table->string('tax_number',20);
            $table->string('phone',20);
            $table->string('address',20);
            $table->string('website',20);
            $table->string('acc_name',20);
            $table->string('acc_number',20);
            $table->string('acc_ifsc',20);
            $table->text('note',500);
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('vendor_mast');
    }
}
