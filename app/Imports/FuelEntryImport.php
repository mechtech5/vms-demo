<?php

namespace App\Imports;

use App\Models\FuelEntry;
use App\Models\PetrolPump;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use App\vehicle_master;

class FuelEntryImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    {  
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['vehicle_number']) && !empty($row['date'])  && !empty($row['pump_name']) && !empty($row['current_diesel_filled']) && !empty($row['total_fuel_amount']))                
            {
                $pump  = PetrolPump::where('fleet_code',$fleet_code)->where('pump_name', 'like',$row['pump_name'])->first();
                $vehicle = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', 'like',$row['vehicle_number'])->first();
            
                if(!empty($pump) && !empty($vehicle)){

                    FuelEntry::create([
                    'fleet_code'    => $row['fleet_code'],
                    'current_diesel_filled' => $row['current_diesel_filled'] ,
                    'date'                  => $row['date'],
                    'payment_mode'          => $row['payment_mode'],
                    'fuel_stn_id'           => $pump->id,
                    'vch_id'                => $vehicle->id,
                    'total_fuel_amt'        =>$row['total_fuel_amount'],
                    'avg_obtained'          => $row['averagemileage']
                    ]);                   

                }
            }
        }
         return $error;
    }
}
