<?php

namespace App\Imports;

use App\Models\PUCDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use DB;
use DateTime;

class PUCDetailsImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    {   
         $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['vehicle_number']) && !empty($row['pay_date'])  && !empty($row['puc_number'])
                && !empty($row['payment_mode']))
            {                        
                $vch_num  = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', 'like',$row['vehicle_number'])->first();
   
                if(!empty($vch_num)){
                    
                    // $cdate = strtotime(date('Y-m-d'));
                    // $cdate = date('Y-m-d ', $cdate);
                    // $date  = strtotime($row['date']);
                    // $date  = date('Y-m-d ', $date);

                    // $date1 = new DateTime($date);
                    // $date2 = new DateTime($cdate);
                    
                    // if($date1 <= $date2){

                        PUCDetails::create([
                        'fleet_code'  => $row['fleet_code'],
                        'vch_id'      => $vch_num->id ,
                        'agent_id'    => 1,
                        'puc_no'      => $row['pay_number'],
                        'puc_amt'     => $row['amount'],
                        'payment_mode'=> $row['payment_mode'],
                        'pay_dt'      => $row['pay_date'],
                        'pay_bank'    => $row['pay_bank'],
                        'pay_branch'  => $row['pay_branch'],
                        'valid_from'  => $row['valid_from'],
                        'valid_till'  => $row['valid_till']
                        ]); 
                    //}

                }
            }
        }
         return $error;
    }
}
