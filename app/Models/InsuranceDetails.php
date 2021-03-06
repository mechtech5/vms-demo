<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceDetails extends Model 
{
    protected $table = 'doc_insurance_det';
    protected $guarded = [];

    public function vehicle(){
    	return $this->belongsTo('App\vehicle_master','vch_id');
    }
    public function agent(){
    	return $this->belongsTo('App\Models\Agent','agent_id');
    }
    public function insurance_company(){
    	return $this->belongsTo('App\Models\InsuranceCompany','ins_comp');
    }
}
