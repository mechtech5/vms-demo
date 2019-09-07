<?php

namespace App\Imports;

use App\City;
use App\State;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;


class CityImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['city_name']) && !empty($row['city_code']) && !empty($row['state_name']))              
            {   
                $state = State::where('fleet_code',$fleet_code)->where('state_name','like',$row['state_name'])->first();
                if(!empty($state)){
                    City::create(['fleet_code'  => $row['fleet_code'],
                                    'city_code' => strtoupper($row['city_code']),
                                    'city_name' => ucfirst($row['city_name']),
                                    'state_id'  => $state->id
                                    ]);                   
                }

            }
        }        
         return $error;
    }
}
