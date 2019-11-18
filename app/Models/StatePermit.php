<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatePermit extends Model 
{
    protected $table   = 'doc_statepermit';
    protected $guarded = [];

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_id');
    }
    public function agent(){
    	return $this->belongsTo('App\Models\Agent','agent_id');
    }
    public function state(){
    	return $this->belongsTo('App\State','state_id');
    }
}
