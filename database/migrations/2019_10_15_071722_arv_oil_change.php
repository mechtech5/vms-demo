<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArvOilChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arv_oil_change', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('vch_id');
            $table->date('date');
            $table->decimal('km_reading',10,2);
            $table->string('oil_grade',20);
            $table->string('oil_comp',20);
            $table->decimal('cost',10,2);
            $table->text('remarks');
            $table->timestamps();
        });
    }
    public function down()
    {
       Schema::dropIfExists('arv_oil_change');
    }
}
