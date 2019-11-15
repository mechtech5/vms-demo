<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FitnessDetails extends Model
{
    protected $table   = 'doc_fitness_det';
    protected $guarded = []; 

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_id');
    } 
}
