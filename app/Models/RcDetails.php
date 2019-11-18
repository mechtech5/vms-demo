<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RcDetails extends Model
{
    protected $table   = 'doc_rc_det';
    protected $guarded = [];

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_id');
    }
    public function agent(){
    	return $this->belongsTo('App\Models\Agent','agent_id');
    }
}
