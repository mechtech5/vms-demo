<?php

namespace App\Imports;

use App\vch_comp;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use App\master_state;
use App\City;

class VehicleModelImport implements ToCollection,WithHeadingRow
{
     public function collection(Collection $rows)
    {   
        $fleet_code = session('fleet_code');
        foreach ($rows as $row) {
            $data = array();
            $status = TRUE;
            if($row['company_name'] != '' && $row['model_name'] != '') {
                $company = vch_comp::where('fleet_code',$fleet_code)->where('comp_name',$row['company_name'])->get();
                if($status == TRUE){
                    if(!empty($company)){
                        $data['state'] =  $company->id;
                    }
                    else{
                        $status = FALSE;
                    }
                }
                if($status == TRUE){
                    
                }
                
            }
        }
    }
}
