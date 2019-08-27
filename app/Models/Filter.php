<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
	protected $table    = 'srv_filter_replacement';
    protected $fillable = ['fleet_code','vch_id','date','filter_type','filter_comp','km_reading','cost'];
}
