<?php

namespace App\Imports;

use App\Models\PetrolPump;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\State;
use Session;
use App\City;

class PetrolPumpImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['petrol_pump_name']) && !empty($row['petrol_pump_phone'])  && !empty($row['petrol_pump_gst']) && !empty($row['petrol_pump_state']) && !empty($row['petrol_pump_city']))                
            {     

                $state  = State::where('fleet_code',$fleet_code)->where('state_name', 'like',$row['petrol_pump_state'])->first();
                $city = City::where('fleet_code',$fleet_code)->where('city_name', 'like',$row['petrol_pump_city'])->first();
                
                if(!empty($state) && !empty($city)){

                    PetrolPump::create([
                    'fleet_code'    => $row['fleet_code'],
                    'pump_name'    => $row['petrol_pump_name'] ,
                    'pump_phone'    => $row['petrol_pump_phone'],
                    'pump_gst_no'   => $row['petrol_pump_gst'],
                    'pump_state'    => $state->id,
                    'pump_city'    => $city->id
                   ]);                   

                }
            }
        }
         return $error;
    }
}
