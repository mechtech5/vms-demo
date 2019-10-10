<?php

namespace App\Imports;

use App\Models\TempPermit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use Session;
use App\State;
use Auth;

class TempPermitImport implements ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');
        

        foreach ($rows as $row) {
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['vehicle_number']) && !empty($row['permit_number'])  && !empty($row['tax_amount']) && !empty($row['state']) && !empty($row['permit_start_date'])
                && !empty($row['permit_end_date']) )
            {                        

                $vch_num  = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', 'like',$row['vehicle_number'])->first();
                $state = State::where('state_name',$row['state'])->first();
            
                if(!empty($vch_num) && !empty($state)){
                    
                        TempPermit::create([
                        'fleet_code'        => $row['fleet_code'],
                        'vch_id'            => $vch_num->id ,
                        'agent_id'          => 1,
                        'tp_permit_no'      => $row['permit_number'],
                        'tp_tax_amt'        => $row['tax_amount'],                        
                        'tp_permit_start_dt'=> $row['permit_start_date'],
                        'tp_permit_end_dt'  => $row['permit_end_date'],
                        'tp_state_id'       => $state->id,
                        'created_by'        => Auth::user()->id
                        ]); 
                    //}

                }
            }
        }
         return $error;
    }
}
