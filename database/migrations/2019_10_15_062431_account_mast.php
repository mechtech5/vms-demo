<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccountMast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('acc_code',20);
            $table->unsignedInteger('acc_owner');
            $table->unsignedInteger('contact');
            $table->text('remarks',500);
            $table->timestamps();
        });
    }
    public function down()
    {
       Schema::dropIfExists('account_mast');
    }
}
