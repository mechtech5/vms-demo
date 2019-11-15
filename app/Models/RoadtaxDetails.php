<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadtaxDetails extends Model
{
    protected $table   = 'doc_roadtax_det';
    protected $guarded = [];

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_id');
    }
}
