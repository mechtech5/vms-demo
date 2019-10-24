<?php

namespace App\Imports;

use App\Models\TyreVendor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use App\State;
use App\City;
use Auth;

class TyreVendorImport implements ToCollection,WithHeadingRow
{    
    public function collection(Collection $rows)
    {
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['name']) && !empty($row['mobile_number'])  && !empty($row['phone_number'])
                && !empty($row['person_name']) && !empty($row['state_name']) && !empty($row['city_name']) && !empty($row['supplier_type']))
            {                        
                $state  = State::where('fleet_code',$fleet_code)->where('state_name', 'like',$row['state_name'])->first();
                $city   = City::where('fleet_code',$fleet_code)->where('city_name', 'like',$row['city_name'])->first(); 
                $status= TRUE;

                if($status == TRUE){
                	if(!empty($state)){	
                		$status = TRUE;
                	}
                	else{
                		$status =FALSE;
                	}

                	if($status == TRUE){
               	
		                if($city->state_id == $state->id){
		              
		                        TyreVendor::create([
		                        'fleet_code'  => $row['fleet_code'],
		                        'name'        => $row['name'] ,
		                        'mobile'      => $row['mobile_number'],
		                        'phone'       => $row['phone_number'],
		                        'contact_person_name' => $row['person_name'],
		                        'state_id'    => $state->id,
		                        'city_id'     => $city->id,
                                'vendor_type' =>$row['supplier_type'],
                                'gst'         =>$row['gst_no'],
                                'email'       =>$row['email'],
                                'created_by'  => Auth::user()->id
		                        ]); 
		                   }
		            }
               }
	               		
	        }

        }
        return $error;
    }
}
