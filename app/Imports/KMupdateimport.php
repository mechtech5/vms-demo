<?php

namespace App\Imports;

use App\Models\KMupdate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use DB;
use DateTime;

class KMupdateimport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    {   
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['vehicle_number']) && !empty($row['date'])  && !empty($row['kilometer_reading']))
            {                        
                $vch_num  = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', 'like',$row['vehicle_number'])->first();
                

                if(!empty($vch_num)){
                    
                    $cdate = strtotime(date('Y-m-d'));
                    $cdate = date('Y-m-d ', $cdate);
                    $date  = strtotime($row['date']);
                    $date  = date('Y-m-d ', $date);

                    $date1 = new DateTime($date);
                    $date2 = new DateTime($cdate);
                    
                    if($date1 <= $date2){

                        KMupdate::create([
                        'fleet_code'   => $row['fleet_code'],
                        'vch_id'       => $vch_num->id ,
                        'date'         => $row['date'],
                        'reading'   => $row['kilometer_reading']
                        ]); 
                    }

                }
            }
        }
         return $error;
    }
}
