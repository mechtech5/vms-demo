<?php

namespace App\Imports;

use App\Driver;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use App\master_state;
use App\City;

class DriverImport implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {    
        $error = array();
        $fleet_code = session('fleet_code');
        foreach ($rows as $row) {

            $row['fleet_code'] =  $fleet_code;

            if(!empty($row['name']) && !empty($row['license_no']) && !empty($row['license_exp']) && !empty($row['phone']))
            {                            
                
                $status = TRUE;
                if($status == TRUE){ 
                    $state  = master_state::where('fleet_code',$fleet_code)->where('state_name', 'like',$row['state'])->first();
                    if(!empty($state)){
                        $status = TRUE;
                    }
                    else{
                        $status = FALSE;
                        $error['state'] = array($row['state']);    
                    }   
                       
                }
                if($status == TRUE){
                    $city   =  City::where('fleet_code',$fleet_code)->where('city_name',$row['city'])->first();
                    $city_scode = $city['state_id'];

                    if( $city_scode == $state->id){
                           Driver::create([
                            'fleet_code' => $row['fleet_code'],
                            'name'       => $row['name'],
                            'address'    => $row['address'],
                            'joined_dt'  => $row['joined_dt'],
                            'salary'     => $row['salary'],
                            'license_no' => $row['license_no'],
                            'license_exp'=> $row['license_exp'],
                            'phone'      => $row['phone'],
                            'state_id'   => $state['id'],
                            'city_id'    => $city['id']
                            ]); 
                        $status = TRUE;
                    }
                    else{
                        $status = FALSE;
                        $error['city'] = array($row['city']);
                    }
                }              
            }
            else{
               $error['requier'] = array('name','license_no','license_exp','phone');
            }

        }
        return $error;
    }
    
}
