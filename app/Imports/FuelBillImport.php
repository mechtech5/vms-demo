<?php

namespace App\Imports;

use App\Models\FuelBill;
use App\Models\PetrolPump;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;

class FuelBillImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['pump_name']) && !empty($row['date'])  && !empty($row['payment_mode']) && !empty($row['total_paid_amount']))                
            {
                $pump  = PetrolPump::where('fleet_code',$fleet_code)->where('pump_name', 'like',$row['pump_name'])->first();
                           
                if(!empty($pump)){

                    FuelBill::create([
                    'fleet_code'    => $row['fleet_code'],
                    'date'                  => $row['date'],
                    'payment_mode'          => $row['payment_mode'],
                    'fuel_stn_id'           => $pump->id,
                    'total_amt_paid'        =>$row['total_paid_amount'],
                   
                    ]);                   

                }
            }
        }
         return $error;
    }
}
