<?php

namespace App\Imports;

use App\Models\InsuranceDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use Session;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Auth;

class InsuranceDetailsImport implements ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    { 

        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['vehicle_number']) && !empty($row['valid_till'])  && !empty($row['insurance_amount']) && !empty($row['payment_mode']) && !empty($row['pay_number'])
                && !empty($row['insurance_policy_number']) )
            {              
                $pay_date   = Date::excelToDateTimeObject($row['pay_date']);
                $valid_from = Date::excelToDateTimeObject($row['valid_from']);
                $valid_till = Date::excelToDateTimeObject($row['valid_till']);

                $vch_num  = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', 'like',$row['vehicle_number'])->first();

                $pay_date   = $pay_date->format('Y-m-d');
                $valid_from = $valid_from->format('Y-m-d');
                $valid_till = $valid_till->format('Y-m-d');
   
                if(!empty($vch_num)){
                    
                    InsuranceDetails::create([
                    'fleet_code'  => $row['fleet_code'],
                    'vch_id'      => $vch_num->id ,
                    'agent_id'    => 1,
                    'ins_policy_no' => $row['insurance_policy_number'],
                    'ins_amt'     => $row['insurance_amount'],
                    'payment_mode'=> $row['payment_mode'],
                    'pay_dt'      => $pay_date,
                    'pay_bank'    => $row['pay_bank'],
                    'pay_branch'  => $row['pay_branch'],
                    'valid_from'  => $valid_from,
                    'valid_till'  => $valid_till,
                    'pay_no'      => $row['pay_number'],
                    'ins_comp'    => $row['insurance_company'],
                    'created_by'  => Auth::user()->id
                    ]);   
                }
            }
        }
         return $error;
    }
}
