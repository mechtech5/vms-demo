<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Session;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\vehicle_master;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\vch_comp;
use App\vch_model;

class VehicleDetailsImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');
        foreach ($rows as $row) {
        	$data = vch_comp::where('fleet_code',$fleet_code)->where('comp_name',$row['vehicle_company'])->get();

        	$model = vch_model::where('fleet_code',$fleet_code)->where('model_name',$row['vehicle_model'])->get();
        	
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['vehicle_no']) && !empty($row['vehicle_company']))                
            {   
                $comp = vehicle_master::where('fleet_code',$fleet_code)->where('vch_no', $row['vehicle_no'])->first();
                $pay_date   = Date::excelToDateTimeObject($row['manufacture_date']);
                if(empty($comp)){
                        vehicle_master::create(['fleet_code'  => $row['fleet_code'],
                                            'vch_no'    => $row['vehicle_no'],
                                            'vch_comp' => $data[0]->id,
                                            'vch_model' => $model[0]->id
                                            ]);  
                }                 

            }
        }
        
         return $error;
    }
}
