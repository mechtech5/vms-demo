<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatteryCharge extends Model
{
     protected $table   = 'srv_battery_charging';
    protected $fillable = ['fleet_code','vch_id','km_reading','cost','date','remarks'];
}
