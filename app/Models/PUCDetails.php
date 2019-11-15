<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PUCDetails extends Model
{
    protected $table   = 'doc_puc_det';
    protected $guarded = [];

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_id');
    }
}
