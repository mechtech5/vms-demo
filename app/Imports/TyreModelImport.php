<?php

namespace App\Imports;

use App\Models\TyreModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;
use App\Models\TyreCompany;


class TyreModelImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $rows)
    { 
        $error = array();
        $fleet_code = session('fleet_code');

        foreach ($rows as $row) {
            
            $row['fleet_code'] =  $fleet_code;
            if(!empty($row['tyre_company_name']) && !empty($row['tyre_model_name']))                
            {   
                $comp = TyreCompany::where('fleet_code',$fleet_code)->where('comp_name', 'like',$row['tyre_company_name'])->first();
                if(!empty($comp)){
                        TyreModel::create(['fleet_code'  => $row['fleet_code'],
                                              'comp_id'  => $comp->id,
                                              'model_name' => $row['tyre_model_name']
                                            ]);  
                }                 

            }
        }
        
         return $error;
    }
}
