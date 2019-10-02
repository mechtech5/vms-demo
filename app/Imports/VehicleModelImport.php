<?php

namespace App\Imports;

use App\vch_comp;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use App\master_state;
use App\City;
use App\vch_model;

class VehicleModelImport implements ToCollection,WithHeadingRow
{
     public function collection(Collection $rows)
    {  
        $fleet_code = session('fleet_code');
        foreach ($rows as $row) {
            $data = array();
            $status = TRUE;
            if($row['company_name'] != '' && $row['model_name'] != '') {
                $company = vch_comp::where('fleet_code',$fleet_code)->where('comp_name',$row['company_name'])->first();
                if($status == TRUE){
                    if(!empty($company)){
                         $data['comp_id'] =  $company->id;
                         $status        = TRUE;                                       
                    }
                    else{
                        $status = FALSE;
                    }
                }
                if($status == TRUE){
                    vch_model::create(['fleet_code'     => $fleet_code,
                                       'vcompany_code'  => $data['comp_id'],
                                       'model_name'     => $row['model_name'],
                                       'model_desc'     => $row['description']
                                     ]);  
                }
                
            }
        }
    }
}
