<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class vehicle_master extends Model
{
	protected $table = 'vch_mast';
    protected $guarded = [];

    public function company(){
    	return $this->belongsTo('App\vch_comp','vch_comp');
    }
    public function model(){
    	return $this->belongsTo('App\vch_model','vch_model');
    }
    public function puc(){
    	return $this->belongsTo('App\Models\PUCDetails','id','vch_id');
    }
    public function rc(){
    	return $this->belongsTo('App\Models\RcDetails','id','vch_id');
    }
    public function fitness(){
    	return $this->belongsTo('App\Models\FitnessDetails','id','vch_id');
    }
    public function permit(){
    	return $this->belongsTo('App\Models\StatePermit','id','vch_id');
    }
    public function insurance(){
    	return $this->belongsTo('App\Models\InsuranceDetails','id','vch_id');
    }
    public function roadtax(){
    	return $this->belongsTo('App\Models\RoadtaxDetails','id','vch_id');
    }
}
