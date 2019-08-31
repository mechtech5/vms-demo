<?php

namespace App\Imports;

use App\Models\StatePermit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use Session;
use App\State;

class StatePermitImport implements ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['vehicle_number']) && !empty($row['pay_date'])  && !empty($row['permit_number']) && !empty($row['payment_mode']) && !empty($row['pay_number'])
                && !empty($row['draft_number']) )
            {                        

                $vch_num  = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', 'like',$row['vehicle_number'])->first();
                $state = State::where('state_name',$row['state'])->first();
            
                if(!empty($vch_num) && !empty($state)){
                    
                        StatePermit::create([
                        'fleet_code'  => $row['fleet_code'],
                        'vch_id'      => $vch_num->id ,
                        'agent_id'    => 1,
                        'permit_no'   => $row['permit_number'],
                        'permit_amt'  => $row['permit_amount'],
                        'payment_mode'=> $row['payment_mode'],
                        'pay_dt'      => $row['pay_date'],
                        'pay_bank'    => $row['pay_bank'],
                        'pay_branch'  => $row['pay_branch'],
                        'valid_from'  => $row['valid_from'],
                        'valid_till'  => $row['valid_till'],
                        'pay_no'      => $row['pay_number'],
                        'state_id'    => $state->id

                        ]); 
                    //}

                }
            }
        }
         return $error;
    }
}
