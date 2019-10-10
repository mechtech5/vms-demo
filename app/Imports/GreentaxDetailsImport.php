<?php

namespace App\Imports;

use App\Models\GreentaxDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use App\State;
use Auth;

class GreentaxDetailsImport implements ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    {  
         $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['vehicle_number']) && !empty($row['pay_date'])  && !empty($row['greentax_number']) && !empty($row['payment_mode']) && !empty($row['pay_number']))
            {                        
                $vch_num  = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', 'like',$row['vehicle_number'])->first();
                
   
                if(!empty($vch_num)){
                    
                    GreentaxDetails::create([
                    'fleet_code'  => $row['fleet_code'],
                    'vch_id'      => $vch_num->id ,
                    'agent_id'    => 1,
                    'greentax_no'  => $row['greentax_number'],
                    'greentax_amt' => $row['greentax_amount'],
                    'payment_mode'=> $row['payment_mode'],
                    'pay_dt'      => $row['pay_date'],
                    'pay_bank'    => $row['pay_bank'],
                    'pay_branch'  => $row['pay_branch'],
                    'valid_from'  => $row['valid_from'],
                    'valid_till'  => $row['valid_till'],
                    'pay_no'      => $row['pay_number'],
                    'created_by'  => Auth::user()->id;
                    ]); 
                }
            }
        }
         return $error;
    }
}
