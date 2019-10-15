<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fleet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',20);
            $table->string('fleet_name',20);
            $table->string('fleet_desc',20);
            $table->unsignedInteger('fleet_owner');
            $table->timestamps();
        });

        Schema::create('fleet_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('fleet_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('fleet_mast');
       Schema::dropIfExists('fleet_user');
    }
}
