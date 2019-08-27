<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OilChange extends Model
{
    protected $table   = 'srv_oil_cleaning_job';
    protected $fillable = ['fleet_code','vch_id','km_reading','cost','date','remarks'];
}
