<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table    = 'driver_mast';
    protected $fillable = ['fleet_code','name','address','salary','license_no','license_exp','joined_dt','phone','state_id','city_id']; 
}
