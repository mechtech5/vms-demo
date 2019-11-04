<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpenseDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('mode_id');
            $table->decimal('exp_amt',10,2);
            $table->date('exp_dt');
            $table->timestamps();
        });

        Schema::create('expense_catg_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->string('catg_name',10);
            $table->string('catg_desc',10);
            $table->timestamps();
        });

        Schema::create('expense_mode_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->string('mode_name',10);
            $table->string('mode_desc',10);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('expense_mast');
        Schema::dropIfExists('expense_mode_mast');
        Schema::dropIfExists('expense_catg_mast');
    }
}
